<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\StripeDonationsController;
use App\Models\User;

# Implement proper routes for the real website.

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::updateOrCreate([
        'email' => $googleUser->getEmail(),
    ], [
        'name' => $googleUser->getName(),
        'google_id' => $googleUser->getId(),
        'password'  => Hash::make(Str::random(32)),
    ]);

    Auth::login($user);

    return redirect('/dashboard');
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

# route for the selling page - simple

# route for the login and registration- controller

# the authenticated portion, need to determine necessary middleware
Route::group(["prefix" => "dashboard", "middleware" => ["auth"]], function () {
    
    # route for the user dashboard

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
