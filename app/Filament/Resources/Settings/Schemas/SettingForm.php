<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('key')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->helperText('Unique identifier for this setting (e.g., hero_title)'),
                
                \Filament\Forms\Components\Select::make('type')
                    ->options([
                        'text' => 'Short Text',
                        'textarea' => 'Long Text / Markdown',
                    ])
                    ->required()
                    ->default('text')
                    ->live(),

                \Filament\Forms\Components\TextInput::make('value')
                    ->label('Content (Short)')
                    ->visible(fn ($get) => $get('type') === 'text')
                    ->columnSpanFull(),

                \Filament\Forms\Components\Textarea::make('value')
                    ->label('Content (Long)')
                    ->visible(fn ($get) => $get('type') === 'textarea')
                    ->rows(5)
                    ->columnSpanFull(),
            ]);
    }
}
