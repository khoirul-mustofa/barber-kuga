<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('kuga.index');
});

Route::get('/booking', [BookingController::class, 'index'])->name('booking');
