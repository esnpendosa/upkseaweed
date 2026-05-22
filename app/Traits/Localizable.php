<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;

trait Localizable
{
    /**
     * Get a localized attribute.
     * Checks for {field}_{locale} first, then falls back to {field}.
     */
    public function getLocalized($field)
    {
        $locale = App::getLocale();
        $localizedField = $field . '_' . $locale;

        // 1. Check for manual DB translation
        if (isset($this->attributes[$localizedField]) && !empty($this->attributes[$localizedField])) {
            return $this->attributes[$localizedField];
        }

        // 2. Return original if locale is 'id'
        if ($locale === 'id') {
            return $this->attributes[$field] ?? null;
        }

        // 3. Fallback to Automatic Translation for others
        $original = $this->attributes[$field] ?? null;
        if (!$original) return null;

        return \App\Services\TranslationService::auto($original, 'id');
    }
}
