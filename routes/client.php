<?php
use App\Http\Controllers\Client\RegisteredUserController;
use App\Http\Controllers\Client\AuthenticatedSessionController;

Route::prefix('client')->group(function () {
    Route::middleware('guest:client')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('client.login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
        Route::get('register', [RegisteredUserController::class, 'create'])->name('client.register');
        Route::post('register', [RegisteredUserController::class, 'store']);
    });

    Route::middleware('auth:client')->group(function () {
        Route::get('home', function () {
            return view('client.dashboard');
        })->name('client.dashboard');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('client.logout');
    });
});
