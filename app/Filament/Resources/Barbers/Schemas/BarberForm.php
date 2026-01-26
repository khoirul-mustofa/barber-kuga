<?php

namespace App\Filament\Resources\Barbers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BarberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('status')
                    ->required(),
                FileUpload::make('avatar')
                    ->disk('public')
                    ->directory('avatar')
                    ->image()
                    ->imageEditor()
                    ->visibility('public')
                    ->required(),
            ]);
    }
}
