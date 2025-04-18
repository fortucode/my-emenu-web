<?php
// use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantPublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/restauran', function(){
    return view('public.restaurant');
});
/*Route::get('/listeresto', function(){
    return view('public.listeresto');
});*/

Route::get('/listeresto', [RestaurantPublicController::class, 'liste'])->name('restaurants.liste');
Route::get('/restauran/{id}', [RestaurantPublicController::class, 'show'])->name('restaurant.public');


// Route::get('/home', function () {
//     return view('root.home');
// })->middleware(['auth', 'verified', 'auth:restaurant'])->name('dashboard');

// Page de connexion par défaut si non connecté
// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Routes pour les restaurants
// Route::middleware('auth:restaurant')->group(function () {
//     Route::get('/home', function () {
//         return view('root.home'); // Vue du tableau de bord du restaurant
//     })->name('dashboard');
// });


Route::get('/restaurant/{id}', [RestaurantPublicController::class, 'show'])->name('restaurant.public');
Route::get('/restaurant/{id}/promotions', [RestaurantPublicController::class, 'promotions'])->name('restaurant.promotions');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// require __DIR__.'/auth.php';

require __DIR__.'/restaurant.php';
require __DIR__.'/admin.php';
require __DIR__.'/client.php';
