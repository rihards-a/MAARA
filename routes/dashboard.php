<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DigitalAssets\{
    SubscriptionsController,
    DeviceController,
    AccountController,
    PlatformController
};

// lifetime feature dashboard routes
Route::group(["prefix" => "dashboard", "middleware" => ["auth"]], function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    
    # only accessible after subscribing
    Route::middleware("haslifetime")->group(function () {
        Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf'); // pdf generation route

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
        
        Route::prefix('digmantojums')->group(function () {
            Route::get('/', [DashboardController::class, 'digmantojums'])->name('dashboard.digmantojums');
            Route::post('/', [DashboardController::class, 'saveDigmantojums'])->name('dashboard.digmantojums.save');
            
            Route::post('ierices', [DeviceController::class, 'store'])->name('dashboard.ierices.store');
            Route::put('ierices/{device}', [DeviceController::class, 'update'])->name('dashboard.ierices.update');
            Route::delete('ierices/{device}', [DeviceController::class, 'destroy'])->name('dashboard.ierices.destroy');
            
            Route::post('accounts', [AccountController::class, 'store'])->name('dashboard.accounts.store');
            Route::put('accounts/{account}', [AccountController::class, 'update'])->name('dashboard.accounts.update');
            Route::delete('accounts/{account}', [AccountController::class, 'destroy'])->name('dashboard.accounts.destroy');
            
            Route::post('platforms', [PlatformController::class, 'store'])->name('dashboard.platforms.store');
            Route::put('platforms/{platform}', [PlatformController::class, 'update'])->name('dashboard.platforms.update');
            Route::delete('platforms/{platform}', [PlatformController::class, 'destroy'])->name('dashboard.platforms.destroy');

            Route::post('/abonementi', [SubscriptionsController::class, 'store'])->name('dashboard.abonementi.store');
        });

        Route::get('pienakumi', [DashboardController::class, 'pienakumi'])->name('dashboard.pienakumi');
        Route::post('pienakumi', [DashboardController::class, 'savePienakumi'])->name('dashboard.pienakumi.save');

        Route::get('zinas', [MessageController::class, 'zinas'])->name('dashboard.zinas');
        Route::post('zinas', [MessageController::class, 'store'])->name('dashboard.zinas.store');
        Route::put('zinas/{message}', [MessageController::class, 'update'])->name('dashboard.zinas.update');
        Route::delete('zinas/{message}', [MessageController::class, 'destroy'])->name('dashboard.zinas.destroy');
        Route::post('zinas/save', [MessageController::class, 'save'])->name('dashboard.zinas.save');

        Route::post('responses/delete/all', [DashboardController::class, 'deleteAllResponses'])->name('dashboard.responses.delete.all');
    });
});
