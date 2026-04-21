<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class AutoLanguage
{
    /**
     * Full language map: browser prefix → app locale
     * Covers the most common global languages automatically.
     */
    protected array $languageMap = [
        // Indonesian
        'id' => 'id',
        // English
        'en' => 'en',
        // Japanese
        'ja' => 'ja',
        // Chinese (Simplified & Traditional → both map to zh)
        'zh' => 'zh',
        // Korean
        'ko' => 'ko',
        // Arabic
        'ar' => 'ar',
        // Spanish
        'es' => 'es',
        // French
        'fr' => 'fr',
        // German
        'de' => 'de',
        // Portuguese (Brazil & Portugal)
        'pt' => 'pt',
        // Russian
        'ru' => 'ru',
        // Dutch
        'nl' => 'nl',
        // Italian
        'it' => 'it',
        // Hindi
        'hi' => 'hi',
        // Thai
        'th' => 'th',
        // Vietnamese
        'vi' => 'vi',
        // Malay
        'ms' => 'ms',
        // Turkish
        'tr' => 'tr',
    ];

    /**
     * Supported app locales (must have a lang file in resources/lang/)
     */
    protected array $supportedLocales = [
        'en', 'id', 'ja', 'zh', 'ko', 'ar', 'es', 'fr', 'de',
        'pt', 'ru', 'nl', 'it', 'hi', 'th', 'vi', 'ms', 'tr',
    ];

    /**
     * Handle an incoming request.
     *
     * Priority:
     *   1) ?lang=xx  query parameter  (explicit user switch)
     *   2) Session   (remembered preference)
     *   3) HTTP Accept-Language header (browser/device locale)
     *   4) Default 'en'
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Explicit query param → store in session
        if ($request->has('lang')) {
            $requested = strtolower(substr($request->query('lang'), 0, 2));
            $locale = $this->resolveLocale($requested);
            session(['locale' => $locale]);
            App::setLocale($locale);
            return $next($request);
        }

        // 2. Remembered in session
        if (session()->has('locale') && in_array(session('locale'), $this->supportedLocales)) {
            App::setLocale(session('locale'));
            return $next($request);
        }

        // 3. Auto-detect from Accept-Language header
        $locale = $this->detectFromHeader($request);
        session(['locale' => $locale]);
        App::setLocale($locale);

        return $next($request);
    }

    /**
     * Parse the Accept-Language header and return best matching locale.
     * Header example: "id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,zh-CN;q=0.6"
     */
    protected function detectFromHeader(Request $request): string
    {
        $header = $request->server('HTTP_ACCEPT_LANGUAGE', 'en');

        $preferences = [];
        foreach (explode(',', $header) as $part) {
            $part = trim($part);
            // Split language tag and quality value
            if (str_contains($part, ';q=')) {
                [$tag, $q] = explode(';q=', $part, 2);
                $quality = (float) $q;
            } else {
                $tag = $part;
                $quality = 1.0;
            }

            // Take only primary subtag (2-char prefix): "id-ID" → "id", "zh-Hans" → "zh"
            $primary = strtolower(substr(trim($tag), 0, 2));
            if (!isset($preferences[$primary])) {
                $preferences[$primary] = $quality;
            }
        }

        // Sort by quality descending
        arsort($preferences);

        // Find first matching locale
        foreach (array_keys($preferences) as $lang) {
            $locale = $this->resolveLocale($lang);
            if ($locale !== null) {
                return $locale;
            }
        }

        return 'en';
    }

    /**
     * Map a 2-char browser language code to a supported app locale.
     */
    protected function resolveLocale(string $lang): ?string
    {
        if (isset($this->languageMap[$lang]) && in_array($this->languageMap[$lang], $this->supportedLocales)) {
            return $this->languageMap[$lang];
        }
        return null;
    }
}
