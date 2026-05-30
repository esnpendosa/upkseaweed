<?php

namespace App\Filament\Resources\TradePriceResource\Pages;

use App\Filament\Resources\TradePriceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTradePrices extends ListRecords
{
    protected static string $resource = TradePriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
