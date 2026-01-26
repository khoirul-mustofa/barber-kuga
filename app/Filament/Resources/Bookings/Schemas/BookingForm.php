<?php

namespace App\Filament\Resources\Bookings\Schemas;

use App\Enums\PaymentMethods;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
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
                TextInput::make('service_id')
                    ->required()
                    ->numeric(),
                TextInput::make('barber_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('booking_date')
                    ->required(),
                TimePicker::make('booking_time')
                    ->required(),
                Toggle::make('payment_status')
                    ->required(),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('payment_method')
                    ->options(PaymentMethods::class)
                    ->required(),
                TextInput::make('proof_of_payment')
                    ->required(),
            ]);
    }
}
