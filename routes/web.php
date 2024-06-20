<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodstallController; 
use App\Http\Controllers\FoodController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
Use App\Http\Controllers\UserController;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    
    ->name('dashboard');

Route::view('profile', 'profile')
    
    ->name('profile');
      
Route::view('warung', 'warung')
        ->name('warung');

        Route::get('/warung', [FoodstallController::class, 'index'])->name('warung');


Route::view('makanan', 'makanan')
        ->name('makanan');

Route::view('kontak', 'kontak')
        ->name('kontak');

        Route::middleware(['auth'])->get('/bookmarks', function () {
                return view('bookmarks');
            })->name('bookmarks');
            

      
Route::middleware(['auth'])->group(function () {
        Route::post('/foodstalls/{foodstall}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
        
    });


    Route::middleware(['auth'])->group(function () {
        Route::post('/foodstalls/{foodstall}/toggle-favorite', [FavoriteController::class, 'toggleFavoriteFoodstall'])
            ->name('foodstalls.toggleFavorite');
        
        Route::post('/foods/{food}/toggle-favorite', [FavoriteController::class, 'toggleFavoriteFood'])
            ->name('foods.toggleFavorite');
    });
    

        Route::post('/foodstalls/{foodstall}/reviews', [ReviewController::class, 'store'])->name('reviews.store');


                Route::get('/foodstalls/{id}', [FoodstallController::class, 'show'])->name('foodstalls.show');

                

                Route::resource('foodstalls', FoodstallController::class);

                

                Route::get('/foodstalls/{foodstall}', [FoodstallController::class, 'show'])->name('foodstalls.show');
                

                Route::get('/foods/{id}', [FoodController::class, 'show'])->name('foods.show');



        
        Route::get('/foodstalls', [FoodstallController::class, 'index']);

        Route::resource('/warung', FoodstallController::class);
        
        Route::resource('', DashboardController::class);
        
        Route::view('dashboard', 'dashboard')
                ->name('dashboard')
              
                ->uses([DashboardController::class, 'index']);

        Route::resource('/makanan', FoodController::class);
     
        Route::post('/toggle-favorite', [FavoriteController::class, 'toggleFavorite'])->name('toggleFavorite');
        Route::get('/bookmarks', [FavoriteController::class, 'index'])->name('bookmarks');

        Route::post('/favorites/store', [FavoriteController::class, 'store'])->name('favorites.store');
        
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

        



require __DIR__.'/auth.php';
