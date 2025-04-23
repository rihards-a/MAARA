<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\StripeSubscriptionController;
use App\Http\Controllers\StripeDonationsController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ProfileController;

//require __DIR__.'/auth.php'; # Laravel Breeze authentication routes

// test route for testing purposes
//use App\Http\Controllers\QuestionnaireController;
//use App\Http\Controllers\SubmissionController;
//Route::get('questionnaire/{id}', [QuestionnaireController::class, 'show'])->name('questionnaire.show');
//Route::post('submission', [SubmissionController::class, 'store'])->name('submission.store');
// end of test routes
use App\Http\Controllers\PrereleaseEmailSubmissionController;
Route::post('PrereleaseEmail', [PrereleaseEmailSubmissionController::class, 'submission'])->name('prerelease.email');

Route::view('/', 'home')->name('home');
//Route::view('/contact', 'contact')->name('contact');
Route::view('/about', 'about')->name('about');
//Route::view('/why_register', 'why_register')->name('why_register');

Route::group(['prefix'=> 'blog'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
});

# the free guide / checklist / overview 
# TODO: trasnfer this to the same system the blogs use, since these are just views with title cards
Route::group(["prefix"=> "guide"], function () {
    Route::get("/", [GuideController::class, 'index'])->name('guide.index');
    Route::get('/registering_the_passing', [GuideController::class, 'registering'])->name('guide.registering');
    Route::get('/available_support', [GuideController::class,'available_support'])->name('guide.available_support');
    Route::get('/burial', [GuideController::class, 'burial'])->name('guide.burial');
    Route::get('/legacy', [GuideController::class,'legacy'])->name('guide.legacy');
    Route::get('/establishments', [GuideController::class,'establishments'])->name('guide.establishments');
    Route::get('/afterloss', [GuideController::class,'afterloss'])->name('guide.afterloss');
    Route::get('/inheritance', [GuideController::class,'inheritance'])->name('guide.inheritance');
    # others...
});
/*
# the authenticated portion, using "haslifetime" middleware added in app/bootstrap as an alias
Route::group(["prefix" => "dashboard", "middleware" => ["auth"]], function () {
    Route::get('/', fn() => view('dashboard.index'))->name('dashboard'); #TODO: modify this view to be our dashboard
    
    # only accessible after subscribing
    Route::middleware("haslifetime")->group(function () {
        # all the sub-routes for the user dashboard
        # here the user will be able to fill out their details
    });
});

# Laravel Breeze starter kit routes - User Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    # end laravel breeze blade
    Route::post('profile/send-deletion-email', [ProfileController::class, 'sendDeletionEmail'])->name('profile.send-deletion-email');
    Route::get('profile/confirm-deletion', [ProfileController::class, 'confirmDeletion'])->name('profile.confirm-deletion');
});

# the socialite google authentication
Route::get('/auth/google', [SocialiteController::class, 'google_redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'google_callback']);

# Stripe life-time subscription routes
Route::middleware('auth')->group(function () {
    Route::get('lifetime', [StripeSubscriptionController::class, 'index'])->name('lifetime.index');
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
*/
