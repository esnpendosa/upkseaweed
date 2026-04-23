<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Schemas\Schema;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Content')
                    ->description('Text shown on this slide.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Hero Title')
                            ->placeholder('e.g. INDONESIA SEAWEED INDUSTRIAL HUB')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('subtitle')
                            ->label('Hero Subtitle')
                            ->placeholder('Connecting Sustainable Farmers...')
                            ->maxLength(500),
                    ])->columns(1),

                Section::make('Media & CTA')
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Background Image')
                            ->image()
                            ->directory('hero')
                            ->visibility('public')
                            ->required(),
                        TextInput::make('cta_text')
                            ->label('Button Text')
                            ->placeholder('Explore Catalog'),
                        TextInput::make('cta_link')
                            ->label('Button Link')
                            ->placeholder('e.g. /products or #contact'),
                    ])->columns(2),

                Section::make('Settings')
                    ->schema([
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower numbers appear first.'),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])->columns(2),
            ]);
    }
}
