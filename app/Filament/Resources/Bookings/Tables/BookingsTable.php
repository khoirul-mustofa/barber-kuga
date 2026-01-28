<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // 1. WRAPPER UTAMA: Split
                // Komponen di dalam Split akan tampil berjejer di Desktop,
                // tapi akan disusun khusus di Mobile.
                Split::make([
                    TextColumn::make('booking_code'),

                    // BAGIAN A: Identitas Pelanggan (Kiri)
                    Stack::make([
                        TextColumn::make('name')
                            ->weight('bold') // Nama ditebalkan
                            ->searchable(),

                        TextColumn::make('email')
                            ->icon('heroicon-m-envelope') // Tambah ikon biar manis
                            ->color('gray')
                            ->searchable(),

                        TextColumn::make('phone')
                            ->icon('heroicon-m-phone')
                            ->color('gray')
                            ->size('xs'), // Ukuran kecil untuk no hp
                    ])->space(1), // Jarak antar teks

                    // BAGIAN B: Detail Booking (Tengah)
                    Stack::make([
                        TextColumn::make('service.name')
                            ->weight('medium')
                            ->prefix('Service: '),

                        TextColumn::make('barber.name')
                            ->prefix('Barber: ')
                            ->color('gray'),

                        TextColumn::make('booking_date')
                            ->date()
                            ->formatStateUsing(fn ($state, $record) => $state.' '.$record->booking_time) // Gabung Tanggal & Jam
                            ->icon('heroicon-m-calendar')
                            ->color('primary'),
                    ])->visibleFrom('md'), // Di HP, bagian ini sembunyi biar gak penuh (masuk ke detail)

                ])
                    ->from('md'), // Titik perubahan: Di bawah ukuran 'md' (Tablet), layout berubah jadi Stack.

                // 2. COLLAPSIBLE CONTENT (ISI DETAIL DI MOBILE)
                // Kolom-kolom di bawah ini berada DI LUAR Split::make().
                // Secara otomatis Filament akan memasukkannya ke dalam tombol "Dropdown/Panah" di tampilan Mobile.

                Stack::make([
                    // Kita munculkan lagi info Service & Barber di sini khusus untuk Mobile
                    // karena di atas tadi kita hide pakai ->visibleFrom('md')
                    ImageColumn::make('proof_of_payment')
                        ->disk('public')
                        ->imageHeight(100)
                        ->label('Bukti Transfer')
                        ->visibility('public'),
                    TextColumn::make('service.name')
                        ->label('Service')
                        ->prefix('Layanan: ')
                        ->visibleFrom('xs')
                        ->hiddenFrom('md'), // Hanya muncul di HP
                    TextColumn::make('payment_method')
                        ->badge()
                        ->label('Metode Bayar'),
                    TextColumn::make('payment_status')
                        ->label('Status Pembayaran')
                        ->badge()
                        ->formatStateUsing(fn ($state) => $state ? 'Sudah DP' : 'Belum DP')
                        ->color(fn ($state) => $state ? 'success' : 'danger'),
                    TextColumn::make('booking_date')
                        ->date()
                        ->formatStateUsing(fn ($state, $record) => $state.' '.$record->booking_time) // Gabung Tanggal & Jam
                        ->icon('heroicon-m-calendar')
                        ->color('primary')
                        ->hiddenFrom('md'),

                ])
                    ->space(2) // Beri jarak agak lega
                    ->visibleFrom('xs'), // Pastikan render
            ])
            ->contentGrid([
                'md' => 1, // Desktop: 1 baris per record (seperti tabel biasa)
                'xl' => 1,
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // EditAction::make(),
                ViewAction::make()
                    ->label('Detail')
                    ->modalHeading('Detail Booking')
                    ->color('info'),            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
