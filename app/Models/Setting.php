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

        // 3. Auto-translate if not in 'id'
        if ($locale !== 'id' && !empty($value)) {
            return \App\Services\TranslationService::auto($value, 'id');
        }

        return $value;
    }
}
