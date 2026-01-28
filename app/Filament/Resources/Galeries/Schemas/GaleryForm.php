<?php

namespace App\Filament\Resources\Galeries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GaleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Input Gaya Rambut') // Judul Section
                    ->description('Masukkan nama gaya dan upload foto contohnya.')
                    ->schema([
                        // 1. Input Nama
                        TextInput::make('name')
                            ->label('Nama Style')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: French Crop')
                            ->columnSpanFull(),

                        // 2. Input Gambar
                        FileUpload::make('image')
                            ->label('Foto Model')
                            ->disk('public')
                            ->directory('barber-styles')
                            ->image()
                            ->imageEditor()
                            ->maxSize(2048)
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]);
    }
}
