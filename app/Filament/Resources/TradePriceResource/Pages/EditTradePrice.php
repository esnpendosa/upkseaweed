<?php

namespace App\Filament\Resources\TradePriceResource\Pages;

use App\Filament\Resources\TradePriceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTradePrice extends EditRecord
{
    protected static string $resource = TradePriceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
