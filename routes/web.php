<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StripeSubscriptionController;
use App\Http\Controllers\StripeDonationsController;
use App\Http\Controllers\SocialiteController;

require __DIR__.'/auth.php'; # Laravel Breeze authentication routes

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog/index'); // need to create, most likely a controller
});

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

# route for the selling page - simple, should point to the login and registration ->
# route for the login and registration- controller, should point to the google auth too

# the authenticated portion, using "haslifetime" middleware added in app/bootstrap as an alias
Route::group(["prefix" => "dashboard", "middleware" => ["auth"]], function () {
    Route::get('/', function () {return view('dashboard');})->name('dashboard'); // currently using the breeze dashboard
    
    # only accessible after subscribing
    Route::middleware("haslifetime")->group(function () {
        Route::get("/lifetime", [DashboardController::class, 'index'])->name('dashboard.index');
    });

    # all the sub-routes for the user dashboard
});

# Laravel Breeze starter kit routes - User Profile
# TEMPORARY DASHBOARD, WILL BE REPLACED BY THE ABOVEm though the starter kit will need to be tweaked

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
# end laravel breeze blade

# the socialite google authentication
Route::get('/auth/google', [SocialiteController::class, 'google_redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'google_callback']);

# Stripe life-time subscription routes
Route::middleware('auth')->group(function () {
    Route::get('lifetime', [StripeSubscriptionController::class, 'index'])->name('index');
    Route::post('checkout', [StripeSubscriptionController::class, 'lifetime_checkout'])->name('checkout');
    Route::get('/checkout/success', [StripeSubscriptionController::class, 'success'])->name('subscription.lifetime.success');
    Route::view('/checkout/cancel', 'checkout.cancel')->name('subscription.lifetime.cancel');
});
Route::post('/stripe/webhook', [StripeSubscriptionController::class, 'webhook'])->name('stripe.webhook')
->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]); # disable csrf for this webhook route

# Stripe donation routes (doesn't track user)
Route::get('donate', [StripeDonationsController::class, 'index'])->name('donate.index');
Route::post('donate', [StripeDonationsController::class, 'checkout'])->name('donate.checkout');

# Language switcher
Route::get("lang/{lang}", function($lang){
    if (in_array($lang, ['en', 'lv'])) {
        app()->setLocale($lang);
        session()->put('locale', $lang);
    }
    return redirect()->back();
})->name("lang.switch");
