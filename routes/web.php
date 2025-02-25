<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\StripeDonationsController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\DashboardController;

# Implement proper routes for the real website.

# the free guide / checklist / overview
Route::group(["prefix"=> "guide"], function () {
    Route::get("/", [GuideController::class, 'index'])->name('guide.index');
    Route::get('/registering', [GuideController::class, 'registering'])->name('guide.registering');
    Route::get('/available_support', [GuideController::class,'available_support'])->name('guide.available_support');
    Route::get('/burial', [GuideController::class, 'burial'])->name('guide.burial');
    Route::get('/legacy', [GuideController::class,'legacy'])->name('guide.legacy');
    Route::get('/establishments', [GuideController::class,'establishments'])->name('establishments');
    # others...
});

# the socialite google authentication
Route::get('/auth/google', [SocialiteController::class, 'google_redirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'google_callback']);

# route for the selling page - simple, should point to the login and registration
# route for the login and registration- controller, should point to the google auth too

# the authenticated portion, need to determine necessary middleware
Route::group(["prefix" => "dashboard", "middleware" => ["auth"]], function () {
    Route::get("/", [DashboardController::class, 'index'])->name('dashboard.index');
    # all the sub-routes for the user dashboard
});

# Old routes

Route::get("lang/{lang}", function($lang){
    if (in_array($lang, ['en', 'lv'])) {
        app()->setLocale($lang);
        session()->put('locale', $lang);
    }
    return redirect()->back();
})->name("lang.switch");

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('get_guide', [GuideController::class, 'email_input'])->name('guide.email_input');
Route::post('get_guide', [GuideController::class, 'email_processing'])->name('guide.email_processing');

Route::get('donate', [StripeDonationsController::class, 'index'])->name('donate.index');
Route::post('donate', [StripeDonationsController::class, 'checkout'])->name('donate.checkout');

// Controller example
Route::get('/blog/{special?}', [BlogController::class, 'index'])->name('blog.index'); 
