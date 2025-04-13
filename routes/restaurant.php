<?php

use App\Http\Controllers\Restaurant\AuthenticatedSessionController;
use App\Http\Controllers\Restaurant\RegisteredUserController;
use App\Http\Controllers\RestaurantController;
use App\Http\controllers\PlatController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;


//Route::get('/2login', function () {
   //     return view('auth.login');
  //  });
    
//Route::prefix('restaurant')->group(function () {
    
    Route::get('/login', [AuthenticatedSessionController::class, 'create']);
                    

    Route::middleware('guest:restaurant')->group(function () {
        Route::get('/register', [RegisteredUserController::class, 'create'])
                    ->name('restaurant.register');
    
        Route::post('/register', [RegisteredUserController::class, 'store']);
    
        
    
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('restaurant.login');
    
        
    });
    
    Route::middleware('auth:restaurant')->group(function () {
        
        //Route::get('/home', function () {
        //    return view('root.home')->name('dashboard');
        //});
        Route::get('/home', [RestaurantController::class, 'home'])->name('dashboard');
    
        Route::get('/listeplat', [PlatController::class, 'index'])->name('plats.index'); // Liste des plats
        Route::get('/ajoutplat', [PlatController::class, 'create'])->name('plats.create'); // Formulaire pour ajouter un plat
        Route::post('/plats', [PlatController::class, 'store'])->name('plats.store'); // Enregistrer un plat
        Route::get('/plats/{id}/edit', [PlatController::class, 'edit'])->name('plats.edit');
        Route::put('/plats/{id}', [PlatController::class, 'update'])->name('plats.update');
        Route::delete('/plats/{id}', [PlatController::class, 'destroy'])->name('plats.destroy');

        //route des combos
        Route::get('/listecombo', [ComboController::class, 'index'])->name('combo.index');
        Route::get('/ajoutcombo', [ComboController::class, 'create'])->name('combo.create');
        Route::post('/combo', [ComboController::class, 'store'])->name('combo.store');
        Route::get('/combo/{id}/edit', [ComboController::class, 'edit'])->name('combo.edit');
        Route::put('/combo/{id}', [ComboController::class, 'update'])->name('combo.update');
        Route::delete('/combo/{id}', [ComboController::class, 'destroy'])->name('combo.destroy');

        //route des romotions
        Route::get('/listepromo', [PromotionController::class, 'index'])->name('promotions.index');
        Route::get('/ajoutpromo', [PromotionController::class, 'create'])->name('promotions.create');
        Route::post('/promotion', [PromotionController::class, 'store'])->name('promotions.store');
        Route::get('/promotion/{id}/edit', [PromotionController::class, 'edit'])->name('promotions.edit');
        Route::put('/promotion/{id}', [PromotionController::class, 'update'])->name('promotions.update');
        Route::delete('/promotion/{id}', [PromotionController::class, 'destroy'])->name('promotions.destroy');

        //routes de profil
        Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
        Route::post('/profil', [ProfilController::class, 'update'])->name('profil.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('restaurant.logout');
    });

//});
