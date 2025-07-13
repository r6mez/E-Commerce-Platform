<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureIsAdmin;

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');

    Route::post('/cart', [CartItemController::class, 'store'])->name('cart.store');
    Route::get('/cart', [CartItemController::class, 'index'])->name('cart.index');
    Route::delete('/cart/{cartItem}', [CartItemController::class, 'destroy'])->name('cart.destroy');
    Route::patch('/cart/{cartItem}', [CartItemController::class, 'update'])->name('cart.update');

    Route::post('/cart/checkout', [CheckoutController::class, 'checkout'])->name('cart.checkout');

    Route::get('/orders', [OrdersController::class, 'index'])->name('order.index');

    Route::middleware(EnsureIsAdmin::class)->group(function () {
        Route::get('/dashboard', function () { return view('dashboard.dashboard'); })->name('dashboard');
        
        Route::prefix('dashboard')->group(function () {
            Route::get('/products', [ProductController::class, 'indexAll'])->name('manageProducts');
            Route::get('/products/add', [ProductController::class, 'create'])->name('products.add');
            Route::post('/products', [ProductController::class, 'store'])->name('products.store');
            Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
            Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
            Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
            Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

            Route::get('/users', [UserController::class, 'index'])->name('manageUsers');
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users', [UserController::class, 'store'])->name('users.store');
            Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
            Route::get('/users/{id}/details', [UserController::class, 'show'])->name('users.show');

            Route::get('/orders', [OrdersController::class, 'indexAll'])->name('manageOrders');
            Route::get('/orders/{id}', [OrdersController::class, 'show'])->name('orders.show');
            Route::get('/orders/{id}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
            Route::put('/orders/{id}', [OrdersController::class, 'update'])->name('orders.update');
            Route::delete('/orders/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy');

            Route::get('/countries', [CountryController::class, 'index'])->name('manageCountries');
            Route::get('/countries/add', [CountryController::class, 'create'])->name('countries.add');
            Route::post('/countries', [CountryController::class, 'store'])->name('countries.store');
            Route::get('/countries/{id}/edit', [CountryController::class, 'edit'])->name('countries.edit');
            Route::put('/countries/{id}', [CountryController::class, 'update'])->name('countries.update');
            Route::delete('/countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');
        });
    });
});

require __DIR__ . '/auth.php';

