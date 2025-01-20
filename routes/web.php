<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

// Controller example
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index'); 
