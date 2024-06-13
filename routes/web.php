<?php

use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodstallController; 
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});


Route::get('/home', function () {
    return view('home');
});


Route::get('/warung', function () {
    return view('warung');
});

Route::get('/makanan', function () {
    return view('makanan');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('dwarung', function () {
    return view('dwarung');
});

Route::get('kontak', function () {
    return view('kontak');
});

Route::get('/foodstalls', [FoodstallController::class, 'index']);

Route::get('/warung', [FoodstallController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class,'index']);

Route::get('/makanan', [FoodController::class, 'index']);

Route::get('/dwarung', [FoodstallController::class, 'show']);

Route::get('/search', [FoodstallController::class, 'search'])->name('search');