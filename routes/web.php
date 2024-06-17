<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodstallController; 
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    
    ->name('dashboard');

Route::view('profile', 'profile')
    
    ->name('profile');
      
Route::view('warung', 'warung')
        ->name('warung');

Route::view('makanan', 'makanan')
        ->name('makanan');

Route::view('kontak', 'kontak')
        ->name('kontak');




                Route::get('/foodstalls/{id}', [FoodstallController::class, 'show'])->name('foodstalls.show');

                Route::resource('foodstalls', FoodstallController::class);

                Route::get('/foodstalls/{foodstall}', [FoodstallController::class, 'show'])->name('foodstalls.show');

                Route::get('/foods/{id_food}', [FoodController::class, 'show'])->name('foods.show');

        
        Route::get('/foodstalls', [FoodstallController::class, 'index']);

        Route::resource('/warung', FoodstallController::class);
        
        Route::resource('/home', HomeController::class);
        Route::resource('', HomeController::class);
        
        Route::resource('/makanan', FoodController::class);

require __DIR__.'/auth.php';
