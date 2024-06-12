<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('/foodstalls', \App\Http\Controllers\FoodstallController::class);

Route::resource('/foods', \App\Http\Controllers\FoodController::class);
