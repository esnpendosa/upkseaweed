<?php

namespace App\Filament\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class SEOSection
{
    public static function make(): Section
    {
        return Section::make('SEO Settings')
            ->description('Optimize this content for search engines.')
            ->icon('heroicon-o-globe-alt')
            ->schema([
                TextInput::make('seo_title')
                    ->label('SEO Title')
                    ->placeholder('Leave empty to use the default title')
                    ->maxLength(70),
                
                TextInput::make('seo_keywords')
                    ->label('SEO Keywords')
                    ->placeholder('e.g., seaweed, industrial, export, indonesia')
                    ->maxLength(255),

                Textarea::make('seo_description')
                    ->label('SEO Description')
                    ->placeholder('Brief summary for search results...')
                    ->rows(3)
                    ->maxLength(160),
            ])
            ->collapsed();
    }
}
