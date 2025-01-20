<?php

use Illuminate\Support\Facades\Route;

Route::get("lang/{lang}", function($lang){
    if (in_array($lang, ['en', 'lv'])) {
        app()->setLocale($lang);
        session()->put('locale', $lang);
    }
    return redirect()->back();
})->name("lang.switch");

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

// Controller example
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index'); 
