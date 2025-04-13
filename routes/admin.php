<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Admin\RegisteredUserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategorieController;
use Doctrine\DBAL\Schema\Index;
// use App\Http\Controllers\RestaurantController;
// use App\Http\controllers\PlatController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/register', [RegisteredUserController::class, 'create'])
                    ->name('admin.register');
    
        Route::post('/register', [RegisteredUserController::class, 'store']);
    
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                    ->name('admin.login');
    
        Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    
        
    });
    
    Route::middleware('auth:admin')->group(function () {
    
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
        Route::get('/listecat', [CategorieController::class, 'index'])->name('categorie.index');
        Route::get('/ajoutcat', [CategorieController::class, 'create'])->name('categorie.create');
        Route::post('/categorie', [CategorieController::class, 'store'])->name('categorie.store');
        Route::get('/categorie/{id}/edit', [CategorieController::class, 'edit'])->name('categorie.edit');
        Route::put('/categorie/{id}', [CategorieController::class, 'update'])->name('categorie.update');
        Route::delete('/categorie/{id}', [CategorieController::class, 'destroy'])->name('categorie.destroy');

       
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('admin.logout');
        
    });
});
