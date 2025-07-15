<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('dashboard')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('users.index');
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            Route::post('', [UserController::class, 'store'])->name('users.store');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
            Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
        });


        Route::prefix('countries')->group(function () {
            Route::get('', [CountryController::class, 'index'])->name('countries.index');
            Route::get('/add', [CountryController::class, 'create'])->name('countries.add');
            Route::post('', [CountryController::class, 'store'])->name('countries.store');
            Route::get('/{country}/edit', [CountryController::class, 'edit'])->name('countries.edit');
            Route::put('/{country}', [CountryController::class, 'update'])->name('countries.update');
            Route::delete('/{country}', [CountryController::class, 'destroy'])->name('countries.destroy');
        });


        Route::prefix('products')->group(function () {
            Route::delete('/{product}/photo/{photo}', [ProductController::class, 'destroyPhoto'])->name('products.photos.destroy');
            Route::get('', [ProductController::class, 'indexAll'])->name('products.index');
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('', [ProductController::class, 'store'])->name('products.store');
            Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
            Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
            Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
            Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        });


        Route::prefix('orders')->group(function () {
            Route::get('', [OrdersController::class, 'indexAll'])->name('orders.index');
            Route::get('/{order}', [OrdersController::class, 'show'])->name('orders.show');
            Route::get('/{order}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
            Route::put('/{order}', [OrdersController::class, 'update'])->name('orders.update');
            Route::delete('/{order}', [OrdersController::class, 'destroy'])->name('orders.destroy');
        });
    });
});
