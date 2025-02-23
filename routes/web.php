<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\StripeDonationsController;

# Implement proper routes for the real website.

# the free guide / checklist / overview
Route::group(["prefix"=> "guide"], function () {
    # Route::get("/", [GuideController::class, 'main'])->name('guide.main');
    # all the sub-routes for the guide 2.1 - 2.5
});

# route for the selling page - simple

# route for the login and registration- controller

# the authenticated portion, need to determine necessary middleware
Route::group(["prefix" => "dashboard", "middleware" => ["auth",""]], function () {
    
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
