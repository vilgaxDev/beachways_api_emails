<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

// Test route
Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

// Real API routes
Route::post('/send-contact-email', [BookingController::class, 'sendEmail']);
Route::get('/contact-submissions', [BookingController::class, 'getAllSubmissions']);
