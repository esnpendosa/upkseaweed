<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AutoLanguage
{
    /**
     * Map common ISO country codes to app locales for automatic IP-based detection.
     */
    protected array $countryMap = [
        'ID' => 'id', 'MY' => 'ms', 'SG' => 'en', 'CN' => 'zh', 'HK' => 'zh', 'TW' => 'zh',
        'JP' => 'ja', 'KR' => 'ko', 'SA' => 'ar', 'AE' => 'ar', 'QA' => 'ar', 'EG' => 'ar',
        'US' => 'en', 'GB' => 'en', 'AU' => 'en', 'CA' => 'en', 'NZ' => 'en',
        'ES' => 'es', 'MX' => 'es', 'AR' => 'es', 'FR' => 'fr', 'DE' => 'de',
        'BR' => 'pt', 'PT' => 'pt', 'RU' => 'ru', 'TR' => 'tr', 'NL' => 'nl', 
        'IT' => 'it', 'IN' => 'hi', 'TH' => 'th', 'VN' => 'vi',
    ];

    protected array $supportedLocales = [
        'en', 'id', 'ja', 'zh', 'ko', 'ar', 'es', 'fr', 'de',
        'pt', 'ru', 'nl', 'it', 'hi', 'th', 'vi', 'ms', 'tr',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        // 1. Manual switch via query parameter
        if ($request->has('lang')) {
            $requested = strtolower(substr($request->query('lang'), 0, 2));
            if (in_array($requested, $this->supportedLocales)) {
                session(['locale' => $requested]);
                App::setLocale($requested);
                return $next($request);
            }
        }

        // 2. Remembered in session
        if (session()->has('locale') && in_array(session('locale'), $this->supportedLocales)) {
            App::setLocale(session('locale'));
            return $next($request);
        }

        // 3. Auto-detect from IP (Location based) - only for first timers without session
        $locale = $this->detectFromIP($request);
        
        // 4. Fallback to Browser Header
        if (!$locale) {
            $locale = $this->detectFromHeader($request);
        }

        $locale = $locale ?: 'en';
        session(['locale' => $locale]);
        App::setLocale($locale);

        return $next($request);
    }

    protected function detectFromIP(Request $request): ?string
    {
        try {
            $ip = $request->ip();
            if ($ip === '127.0.0.1') return 'id'; // Local dev default

            // Use a high-performance, free GeoIP API with cache
            $response = Http::timeout(2)
                ->get("http://ip-api.com/json/{$ip}?fields=status,countryCode");

            if ($response->successful() && $response->json('status') === 'success') {
                $countryCode = $response->json('countryCode');
                return $this->countryMap[$countryCode] ?? null;
            }
        } catch (\Exception $e) {
            Log::warning('GeoIP Detection Failed: ' . $e->getMessage());
        }
        return null;
    }

    protected function detectFromHeader(Request $request): string
    {
        $header = $request->server('HTTP_ACCEPT_LANGUAGE', 'en');
        $parts = explode(',', $header);
        if (!empty($parts)) {
            $primary = strtolower(substr(trim($parts[0]), 0, 2));
            if (in_array($primary, $this->supportedLocales)) {
                return $primary;
            }
        }
        return 'en';
    }
}
