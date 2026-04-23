<?php

namespace App\Filament\Resources\EducationModuleResource\Pages;

use App\Filament\Resources\EducationModuleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationModule extends EditRecord
{
    protected static string $resource = EducationModuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
