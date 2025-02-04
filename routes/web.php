<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\StripeDonationsController;

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
