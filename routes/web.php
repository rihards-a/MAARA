<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\StripeSubscriptionController;
use App\Http\Controllers\StripeDonationsController;
use App\Http\Controllers\SocialiteController;

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

# route for the selling page - simple, should point to the login and registration
# route for the login and registration- controller, should point to the google auth too

# TODO create middleware for checking subscriptions
# the authenticated portion, need to determine necessary middleware - check if subscribed
#Route::group(["prefix" => "dashboard", "middleware" => ["auth"]], function () {
    # Route::get("/", [DashboardController::class, 'index'])->name('dashboard.index');
    # all the sub-routes for the user dashboard
#});

Route::get('/', function () {
    return view('home');
});

# from laravel breeze blade - user authentication
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
# end laravel breeze blade

# the socialite google authentication
Route::get('/auth/google', [SocialiteController::class, 'google_redirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'google_callback']);

# Stripe routes for buying lifetime subscription
Route::middleware('auth')->group(function () {
    Route::get('lifetime', [StripeSubscriptionController::class, 'index'])->name('index');
    Route::post('checkout', [StripeSubscriptionController::class, 'lifetime_checkout'])->name('checkout');
    Route::get('/checkout/success', [StripeSubscriptionController::class, 'success'])->name('subscription.lifetime.success');
    Route::view('/checkout/cancel', 'checkout.cancel')->name('subscription.lifetime.cancel');
});
Route::post('/stripe/webhook', [StripeSubscriptionController::class, 'webhook'])->name('stripe.webhook')
->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]); # disable csrf for this webhook route

// Smart-ID Authentication Routes
use App\Http\Controllers\SmartIdController;
Route::prefix('smartid')->name('smartid.')->group(function () {
    // Form display
    Route::get('/auth', [SmartIdController::class, 'showAuthenticationForm'])->name('form');
    
    // Authentication endpoints
    Route::post('/authenticate', [SmartIdController::class, 'authenticate'])->name('authenticate');
    Route::post('/authenticate-with-document', [SmartIdController::class, 'authenticateWithDocumentNumber'])->name('authenticate.document');
    
    // Polling endpoint
    Route::get('/poll', [SmartIdController::class, 'pollAuthenticationStatus'])->name('poll');
    
    // Status and logout
    Route::get('/status', [SmartIdController::class, 'checkAuthenticationStatus'])->name('status');
    Route::post('/logout', [SmartIdController::class, 'logout'])->name('logout');
});

// routes/api.php
require __DIR__.'/api.php';
Route::get('/smart/login', [App\Http\Controllers\SmartAuthController::class, 'showLoginForm'])->name('login');
Route::get('/smart/dashboard', function () {
    return view('dashboard');
})->middleware('auth:sanctum');
# Old routes

Route::get("lang/{lang}", function($lang){
    if (in_array($lang, ['en', 'lv'])) {
        app()->setLocale($lang);
        session()->put('locale', $lang);
    }
    return redirect()->back();
})->name("lang.switch");

#Route::get('/', function () {
#    return view('home');
#});

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

