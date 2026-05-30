<?php

namespace App\Filament\Resources\HeroSlides;

use App\Filament\Resources\HeroSlides\Pages\CreateHeroSlide;
use App\Filament\Resources\HeroSlides\Pages\EditHeroSlide;
use App\Filament\Resources\HeroSlides\Pages\ListHeroSlides;
use App\Filament\Resources\HeroSlides\Pages\ViewHeroSlide;
use App\Filament\Resources\HeroSlides\Schemas\HeroSlideForm;
use App\Filament\Resources\HeroSlides\Schemas\HeroSlideInfolist;
use App\Filament\Resources\HeroSlides\Tables\HeroSlidesTable;
use App\Models\HeroSlide;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HeroSlideResource extends Resource
{
    protected static ?string $model = HeroSlide::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Konten';
    protected static ?string $navigationLabel = 'Slide Hero';
    protected static ?string $pluralModelLabel = 'Slide Hero';
    protected static ?string $modelLabel = 'Slide Hero';

    public static function form(Schema $schema): Schema
    {
        return HeroSlideForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HeroSlideInfolist::configure($schema);
    }

    public static function table(\Filament\Tables\Table $table): \Filament\Tables\Table
    {
        return HeroSlidesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHeroSlides::route('/'),
            'create' => CreateHeroSlide::route('/create'),
            'view' => ViewHeroSlide::route('/{record}'),
            'edit' => EditHeroSlide::route('/{record}/edit'),
        ];
    }
}
