<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/destinations', [BookingController::class, 'showDestinations'])->name('destinations');
Route::get('/seats/{destination_id}', [BookingController::class, 'showSeats'])->name('seats');
Route::post('/book-seat', [BookingController::class, 'bookSeat'])->name('book-seat');
