<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    public static function get($key, $default = null)
    {
        $locale = app()->getLocale();
        
        // 1. Try manual localized version (e.g., hero_title_id)
        $localized = static::where('key', $key . '_' . $locale)->first();
        if ($localized) return $localized->value;

        // 2. Fallback to base key
        $baseSetting = static::where('key', $key)->first();
        if (!$baseSetting) return $default;

        $value = $baseSetting->value;

        // 3. Auto-translate if not in 'id' (Skip for phone/email to prevent broken links)
        $skipTranslate = ['whatsapp_number', 'email', 'phone'];
        if ($locale !== 'id' && !empty($value) && !in_array($key, $skipTranslate)) {
            return \App\Services\TranslationService::auto($value, 'id');
        }

        return $value;
    }

    public static function getLocalized($key, $default = null)
    {
        return static::get($key, $default);
    }
}
