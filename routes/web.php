<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerController;

Route::get('/', function () {
    return view('home');
});

// Route::resource('/buyers', \App\Http\Controllers\BuyerController::class);

Route::get('buyers/data', [BuyerController::class, 'getData'])->name('buyers.getData');
Route::get('buyers/{buyers:slug}/edit', [BuyerController::class, 'edit'])->name('buyers.edit');
Route::resource('buyers', BuyerController::class)->except(['edit']);