<?php

namespace App\Filament\Resources\Galeries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GaleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->disk('public')
                // HAPUS ->height(80) dan ->width(80) yang deprecated
                    ->extraImgAttributes([
                        'class' => 'h-20 w-20 object-cover rounded-md',
                        // Penjelasan Class Tailwind:
                        // 'h-20'       : Tinggi 80px (20 * 4px)
                        // 'w-20'       : Lebar 80px
                        // 'object-cover': Crop tengah (anti gepeng)
                        // 'rounded-md' : Sudut melengkung
                    ]),

                // 2. Kolom Nama
                TextColumn::make('name')
                    ->label('Nama Style')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),
            ])
            ->defaultSort('created_at', 'desc')

            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
