<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'response',
        'type',
        'value',
        'order',
        'is_active',
    ];

    public function getLocalizedLabel()
    {
        $locale = app()->getLocale();
        if ($locale === 'id') return $this->label;
        
        return \App\Services\TranslationService::auto($this->label, 'id');
    }

    public function getLocalizedResponse()
    {
        if (!$this->response) return null;
        
        $locale = app()->getLocale();
        if ($locale === 'id') return $this->response;
        
        return \App\Services\TranslationService::auto($this->response, 'id');
    }
}
