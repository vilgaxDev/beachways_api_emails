<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Api\SubscriberController;

// Subscriber routes
Route::post('/subscribe', [SubscriberController::class, 'subscribe']);
Route::get('/subscribers', [SubscriberController::class, 'index']);

// Test route
Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

// Real API routes
Route::post('/send-contact-email', [BookingController::class, 'sendEmail']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'user']);
    
    Route::apiResource('properties', \App\Http\Controllers\Api\PropertyController::class)->except(['index', 'show']);
    Route::apiResource('enquiries', \App\Http\Controllers\Api\EnquiryController::class)->except(['store']);
    Route::apiResource('users', \App\Http\Controllers\Api\UserController::class);
    Route::apiResource('hero-sliders', \App\Http\Controllers\Api\HeroSliderController::class)->except(['index']);
    Route::post('/send-bulk-email', [\App\Http\Controllers\Api\BulkEmailController::class, 'send']);
});

Route::get('/properties', [\App\Http\Controllers\Api\PropertyController::class, 'index']);
Route::get('/properties/{property}', [\App\Http\Controllers\Api\PropertyController::class, 'show']);

Route::get('/contact-submissions', [BookingController::class, 'getAllSubmissions']);

Route::get('/about-section', [\App\Http\Controllers\AboutSectionController::class, 'index']);
Route::post('/about-section', [\App\Http\Controllers\AboutSectionController::class, 'store']);
Route::post('/about-section/delete-gallery-image', [\App\Http\Controllers\AboutSectionController::class, 'deleteGalleryImage']);
// Public enquiry submission
Route::post('/enquiries', [\App\Http\Controllers\Api\EnquiryController::class, 'store']);

Route::get('/hero-sliders', [\App\Http\Controllers\Api\HeroSliderController::class, 'index']);

// Site Settings routes
Route::get('/site-settings', [\App\Http\Controllers\Api\SiteSettingController::class, 'index']);
Route::middleware('auth:sanctum')->post('/site-settings', [\App\Http\Controllers\Api\SiteSettingController::class, 'update']);

