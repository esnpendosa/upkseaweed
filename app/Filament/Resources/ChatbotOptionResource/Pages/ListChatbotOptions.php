<?php

namespace App\Filament\Resources\ChatbotOptionResource\Pages;

use App\Filament\Resources\ChatbotOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChatbotOptions extends ListRecords
{
    protected static string $resource = ChatbotOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
