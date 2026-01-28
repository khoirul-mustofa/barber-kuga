<?php

namespace App\Filament\Resources\Bookings\Schemas;

use App\Enums\PaymentMethods;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                Select::make('service_id')
                    ->label('Layanan')
                    ->relationship('service', 'name')
                    ->native(false)
                    ->required(),
                Select::make('barber_id')
                    ->label('Barber')
                    ->relationship('barber', 'name')
                    ->native(false)
                    ->required(),
                DatePicker::make('booking_date')
                    ->required(),
                TimePicker::make('booking_time')
                    ->required(),
                Toggle::make('payment_status')
                    ->label('Status Pembayaran')
                    ->helperText('Menandakan apakah pelanggan sudah membayar DP')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-m-check-circle')
                    ->offIcon('heroicon-m-x-circle')
                    ->inline(false)
                    ->required(),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('payment_method')
                    ->options(PaymentMethods::class)
                    ->required(),
                FileUpload::make('proof_of_payment')
                    ->disk('public')
                    ->directory('payment_proofs')
                    ->visibility('public')
                    ->image()
                    ->imageEditor()
                    ->required(),
            ]);
    }
}
