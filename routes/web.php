<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ProductCategoryController;

Route::get('/', function () {
    return view('home');
});

// Route::resource('/buyers', \App\Http\Controllers\BuyerController::class);

Route::get('buyers/data', [BuyerController::class, 'getData'])->name('buyers.getData');
Route::get('buyers/{buyers:slug}/edit', [BuyerController::class, 'edit'])->name('buyers.edit');
Route::resource('buyers', BuyerController::class)->except(['edit']);

Route::get('product-categories/data', [ProductCategoryController::class, 'getData'])->name('product-categories.getData');
Route::get('product-categories/{productCategory}/edit', [ProductCategoryController::class, 'edit'])->name('product-categories.edit');
Route::resource('product-categories', ProductCategoryController::class)->except(['edit']);;