<?php
use App\Http\Controllers\Client\RegisteredUserController;
use App\Http\Controllers\Client\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->group(function () {
    Route::middleware('guest:client')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('client.login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('client.register');
        Route::post('/register', [RegisteredUserController::class, 'store']);
    });

    Route::get('dashboard-partial', [\App\Http\Controllers\Client\ClientDashboardController::class, 'dashboardAjax'])
    ->middleware('auth:client')
    ->name('client.dashboard.ajax');

    
    //affichage du panier
    Route::get('panier/ajax', [\App\Http\Controllers\Client\ClientDashboardController::class, 'getPanierAjax'])
    ->name('client.panier.ajax');

    //validation panier
Route::post('panier/checkout', [\App\Http\Controllers\Client\ClientDashboardController::class, 'checkoutPanier'])
    ->name('client.panier.checkout')
    ->middleware('auth:client');


    
    Route::middleware('auth:client')->group(function () {
       // Route::get('home', function () {
       //     return view('client.dashboard');
       // })->name('client.dashboard');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('client.logout');
    });
});
