<?php

namespace App\Filament\Resources\Galeries\Pages;

use App\Filament\Resources\Galeries\GaleryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGaleries extends ListRecords
{
    protected static string $resource = GaleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
