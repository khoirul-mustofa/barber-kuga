<?php

namespace App\Filament\Resources\Galeries\Pages;

use App\Filament\Resources\Galeries\GaleryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGalery extends EditRecord
{
    protected static string $resource = GaleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
