<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\StripeSubscriptionController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ProfileController;

require __DIR__.'/auth.php'; # Laravel Breeze authentication routes
require __DIR__.'/dashboard.php'; # Lifetime feature dashboard routes

// STATIC PAGES //
Route::view('/', 'home')->name('home');
Route::view('/par-mums', 'about')->name('about');
Route::view('/privatuma-politika', 'privacy-policy')->name('privacy-policy');
Route::view('/kapec-registreties', 'why_register')->name('why_register');

// BLOG //
Route::group(['prefix'=> 'blogs'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
});

// GUIDE FREE //
Route::group(["prefix"=> "celvedis-palicejiem"], function () {
    Route::get("/", [GuideController::class, 'index'])->name('guide.index');
    Route::get('/pirmie-soli', [GuideController::class,'afterloss'])->name('guide.afterloss');
    Route::get('/mirsanas-registracija', [GuideController::class, 'registering'])->name('guide.registering');
    Route::get('/pabalsts', [GuideController::class,'available_support'])->name('guide.available_support');
    Route::get('/mantojums', [GuideController::class,'inheritance'])->name('guide.inheritance');
    Route::get('/bankas-iestades', [GuideController::class,'establishments'])->name('guide.establishments');
    Route::get('/apbedisana-pakalpojumi', [GuideController::class, 'burial'])->name('guide.burial');
    Route::get('/emocionalais-atbalsts', [GuideController::class,'legacy'])->name('guide.legacy');
});

// PROFILE //
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    # end laravel breeze blade
    Route::post('profile/send-deletion-email', [ProfileController::class, 'sendDeletionEmail'])->name('profile.send-deletion-email');
    Route::get('profile/confirm-deletion', [ProfileController::class, 'confirmDeletion'])->name('profile.confirm-deletion');
});

// SOCIALITE // 
Route::get('/auth/google', [SocialiteController::class, 'google_redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'google_callback']);

// STRIPE //
Route::middleware('auth')->group(function () {
    Route::get('lifetime', [StripeSubscriptionController::class, 'index'])->name('lifetime.index');
    Route::post('checkout', [StripeSubscriptionController::class, 'lifetime_checkout'])->name('checkout');
    Route::get('/checkout/success', [StripeSubscriptionController::class, 'success'])->name('subscription.lifetime.success');
});
Route::post('/stripe/webhook', [StripeSubscriptionController::class, 'webhook'])->name('stripe.webhook')
->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]); # disable csrf for this webhook route

// DISABLED //
# Stripe donation routes (don't track the user)
//use App\Http\Controllers\StripeDonationsController;
//Route::get('donate', [StripeDonationsController::class, 'index'])->name('donate.index');
//Route::post('donate', [StripeDonationsController::class, 'checkout'])->name('donate.checkout');
# Email submission closed
//use App\Http\Controllers\PrereleaseEmailSubmissionController;
//Route::post('PrereleaseEmail', [PrereleaseEmailSubmissionController::class, 'submission'])->name('prerelease.email');
