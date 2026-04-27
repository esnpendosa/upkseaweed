<?php

namespace App\Filament\Resources\ChatbotOptionResource\Pages;

use App\Filament\Resources\ChatbotOptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChatbotOption extends EditRecord
{
    protected static string $resource = ChatbotOptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
