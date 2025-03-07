<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// SmartID authentication routes
use App\Http\Controllers\SmartIdApiController;
Route::prefix('auth/smartid')->name('auth.smartid.')->group(function () {
    Route::post('/init', [SmartIdApiController::class, 'initiateAuthentication'])->name('init');
    Route::post('/poll', [SmartIdApiController::class, 'pollAuthenticationStatus'])->name('poll');
    
    // Protected routes - require authentication
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [SmartIdApiController::class, 'logout'])->name('logout');
    });
});
