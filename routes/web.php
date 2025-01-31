<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('/buyers', \App\Http\Controllers\BuyerController::class);