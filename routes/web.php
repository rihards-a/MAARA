<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\StripeSubscriptionController;
use App\Http\Controllers\StripeDonationsController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\PDFController;
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

// test route for testing purposes
//use App\Http\Controllers\QuestionnaireController;
//use App\Http\Controllers\SubmissionController;
//Route::get('questionnaire/{id}', [QuestionnaireController::class, 'show'])->name('questionnaire.show');
//Route::post('submission', [SubmissionController::class, 'store'])->name('submission.store');
// end of test routes

require __DIR__.'/auth.php'; # Laravel Breeze authentication routes

use App\Http\Controllers\PrereleaseEmailSubmissionController;
Route::post('PrereleaseEmail', [PrereleaseEmailSubmissionController::class, 'submission'])->name('prerelease.email');

Route::view('/', 'home')->name('home');
Route::view('/par-mums', 'about')->name('about');
Route::view('/privatuma-politika', 'privacy-policy')->name('privacy-policy');
Route::view('/test', 'test')->name('test'); // test route for testing purposes
Route::view('/why_register', 'why_register')->name('why_register');


Route::group(['prefix'=> 'blogs'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
});

# the free guide / checklist / overview 
# TODO: trasnfer this to the same system the blogs use, since these are just views with title cards
Route::group(["prefix"=> "celvedis-palicejiem"], function () {
    Route::get("/", [GuideController::class, 'index'])->name('guide.index');
    Route::get('/pirmie-soli', [GuideController::class,'afterloss'])->name('guide.afterloss');
    Route::get('/mirsanas-registracija', [GuideController::class, 'registering'])->name('guide.registering');
    Route::get('/pabalsts', [GuideController::class,'available_support'])->name('guide.available_support');
    Route::get('/mantojums', [GuideController::class,'inheritance'])->name('guide.inheritance');
    Route::get('/bankas-iestades', [GuideController::class,'establishments'])->name('guide.establishments');
    Route::get('/apbedisana-pakalpojumi', [GuideController::class, 'burial'])->name('guide.burial');
    Route::get('/emocionalais-atbalsts', [GuideController::class,'legacy'])->name('guide.legacy');
    # others...
});

# the authenticated portion, using "haslifetime" middleware added in app/bootstrap as an alias
Route::group(["prefix" => "dashboard", "middleware" => ["auth"]], function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    
    # only accessible after subscribing
    Route::middleware("haslifetime")->group(function () {
        Route::get('med', [DashboardController::class, 'med'])->name('dashboard.med');
        Route::post('med', [DashboardController::class, 'saveMed'])->name('dashboard.med.save');

        Route::get('pensija', [DashboardController::class, 'pensija'])->name('dashboard.pensija');
        Route::post('pensija', [DashboardController::class, 'savePensija'])->name('dashboard.pensija.save');

        Route::get('beres', [DashboardController::class, 'beres'])->name('dashboard.beres');
        Route::post('beres', [DashboardController::class, 'saveBeres'])->name('dashboard.beres.save');

        Route::get('finanses', [DashboardController::class, 'finanses'])->name('dashboard.finanses');
        Route::post('finanses', [DashboardController::class, 'saveFinanses'])->name('dashboard.finanses.save');

        Route::get('testaments', [DashboardController::class, 'testaments'])->name('dashboard.testaments');
        Route::post('testaments', [DashboardController::class, 'saveTestaments'])->name('dashboard.testaments.save');

        Route::get('digmantojums', [DashboardController::class, 'digmantojums'])->name('dashboard.digmantojums');
        Route::post('digmantojums', [DashboardController::class, 'saveDigmantojums'])->name('dashboard.digmantojums.save');

        Route::get('pienakumi', [DashboardController::class, 'pienakumi'])->name('dashboard.pienakumi');
        Route::post('pienakumi', [DashboardController::class, 'savePienakumi'])->name('dashboard.pienakumi.save');

        Route::get('zinas', [MessageController::class, 'zinas'])->name('dashboard.zinas');
        Route::post('zinas', [MessageController::class, 'store'])->name('dashboard.zinas.store');
        Route::put('zinas/{message}', [MessageController::class, 'update'])->name('dashboard.zinas.update');
        Route::delete('zinas/{message}', [MessageController::class, 'destroy'])->name('dashboard.zinas.destroy');
        
        Route::post('/ierices', [DeviceController::class, 'store'])->name('dashboard.ierices.store');
        Route::put('/ierices/{device}', [DeviceController::class, 'update'])->name('dashboard.ierices.update');
        Route::delete('/ierices/{device}', [DeviceController::class, 'destroy'])->name('dashboard.ierices.destroy');
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
