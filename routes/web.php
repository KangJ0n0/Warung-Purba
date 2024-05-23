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
