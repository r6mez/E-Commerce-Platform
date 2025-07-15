<?php

use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['seller'])->prefix('seller')->name('seller.')->group(function () {
    Route::get('', [SellerController::class, 'index'])->name('index');
    Route::get('/emailCSV/{reciver}', [SellerController::class, 'emailCSV'])->name('products.email');

    Route::prefix('products')->name('products.')->group(function () {
        Route::delete('/{product}/photo/{photo}', [SellerProductController::class, 'destroyPhotoForSeller'])->name('photos.destroy');
        Route::get('', [SellerProductController::class, 'index'])->name('index');
        Route::get('/create', [SellerProductController::class, 'create'])->name('create');
        Route::post('', [SellerProductController::class, 'store'])->name('store');
        Route::get('/{product}/edit', [SellerProductController::class, 'edit'])->name('edit');
        Route::put('/{product}', [SellerProductController::class, 'update'])->name('update');
        Route::get('/export', [SellerController::class, 'exportCSV'])->name('export');
    });
});
