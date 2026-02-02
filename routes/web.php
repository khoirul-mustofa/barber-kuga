<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/booking', \App\Livewire\BookingWizard::class)->name('booking');
Route::get('/cek-booking', \App\Livewire\CheckBooking::class)->name('check-booking');
// Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
// Route::get('/booking/time-slots', [BookingController::class, 'timeSlots'])->name('booking.time-slots');

Route::get('/journal', [JournalController::class, 'index'])->name('journal.index');
Route::get('/journal/{title}', [JournalController::class, 'view'])->name('journal.view');
