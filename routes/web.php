<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductCategoryController;

Route::get('/', function () {
    return view('home');
});

Route::get('buyers/data', [BuyerController::class, 'getData'])->name('buyers.getData');
Route::get('buyers/{buyers:slug}/edit', [BuyerController::class, 'edit'])->name('buyers.edit');
Route::resource('buyers', BuyerController::class)->except(['edit']);

Route::get('marketplaces/data', [MarketplaceController::class, 'getData'])->name('marketplaces.getData');
Route::get('marketplaces/{marketplaces}/edit', [MarketplaceController::class, 'edit'])->name('marketplaces.edit');
Route::resource('marketplaces', MarketplaceController::class)->except(['edit']);

Route::get('product-categories/data', [ProductCategoryController::class, 'getData'])->name('product-categories.getData');
Route::get('product-categories/{productCategory}/edit', [ProductCategoryController::class, 'edit'])->name('product-categories.edit');
Route::resource('product-categories', ProductCategoryController::class)->except(['edit']);

Route::get('product-brands/data', [ProductBrandController::class, 'getData'])->name('product-brands.getData');
Route::get('product-brands/{productBrands}/edit', [ProductBrandController::class, 'edit'])->name('product-brands.edit');
Route::resource('product-brands', ProductBrandController::class)->except(['edit']);