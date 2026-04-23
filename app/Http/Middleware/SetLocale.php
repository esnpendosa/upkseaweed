<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('lang')) {
            $lang = $request->get('lang');
            Session::put('locale', $lang);
            App::setLocale($lang);
        } elseif (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        } else {
            // Auto detection logic
            $browserLang = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            $supportedLangs = ['id', 'en', 'zh', 'ja', 'ko', 'ar', 'es', 'fr', 'de', 'pt', 'ru'];
            
            $locale = in_array($browserLang, $supportedLangs) ? $browserLang : 'en';
            
            App::setLocale($locale);
            Session::put('locale', $locale);
        }

        return $next($request);
    }
}
