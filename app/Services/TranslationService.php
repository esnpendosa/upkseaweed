<?php

namespace App\Services;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class TranslationService
{
    /**
     * Translate a string to the target language.
     * Uses Cache to prevent redundant API calls.
     */
    public static function translate($text, $target = 'en', $source = 'id')
    {
        if (empty($text) || $target === $source) {
            return $text;
        }

        $cacheKey = 'trans_' . md5($text) . '_' . $target;

        return Cache::rememberForever($cacheKey, function () use ($text, $target, $source) {
            try {
                $tr = new GoogleTranslate();
                $tr->setSource($source);
                $tr->setTarget($target);
                
                return $tr->translate($text);
            } catch (\Exception $e) {
                Log::error('Translation Error: ' . $e->getMessage());
                return $text; // Fallback to original text
            }
        });
    }

    /**
     * Auto-detect and translate based on current app locale.
     */
    public static function auto($text, $source = 'id')
    {
        $target = app()->getLocale();
        return static::translate($text, $target, $source);
    }
}
