<?php

namespace App\Filament\Resources\EducationModuleResource\Pages;

use App\Filament\Resources\EducationModuleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationModules extends ListRecords
{
    protected static string $resource = EducationModuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
