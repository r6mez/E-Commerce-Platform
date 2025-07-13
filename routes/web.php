<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CheckoutController;

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
            Route::get('/products', [ProductController::class, 'showAll'])->name('manageProducts');
            Route::get('/products/add', [ProductController::class, 'createProduct'])->name('products.add');
            Route::post('/products', [ProductController::class, 'storeProduct'])->name('products.storeProduct');
            Route::get('/products/{id}/edit', [ProductController::class, 'editProductInfo'])->name('products.editProductInfo');
            Route::get('/products/{id}', [ProductController::class, 'showProductInfo'])->name('products.showProductInfo');
            Route::put('/products/{id}', [ProductController::class, 'updateProductInfo'])->name('products.updateProductInfo');
            Route::delete('/products/{id}', [ProductController::class, 'destroyProduct'])->name('products.destroyProduct');

            Route::get('/users', [ProfileController::class, 'showAll'])->name('manageUsers');
            Route::get('/users/add', [ProfileController::class, 'createUser'])->name('users.add');
            Route::post('/users', [ProfileController::class, 'storeUser'])->name('users.storeUser');
            Route::get('/users/{id}/edit', [ProfileController::class, 'editUserInfo'])->name('users.editUserInfo');
            Route::put('/users/{id}', [ProfileController::class, 'updateUserInfo'])->name('users.updateUserInfo');
            Route::delete('/users/{id}', [ProfileController::class, 'destroyUser'])->name('users.destroyUser');
            Route::get('/users/{id}/details', [ProfileController::class, 'showUserInfo'])->name('users.showUserInfo');

            Route::get('/orders', [OrdersController::class, 'showAll'])->name('manageOrders');
            Route::get('/orders/{id}', [OrdersController::class, 'showOrder'])->name('orders.show');
            Route::get('/orders/{id}/edit', [OrdersController::class, 'editOrder'])->name('orders.edit');
            Route::put('/orders/{id}', [OrdersController::class, 'updateOrder'])->name('orders.update');
            Route::delete('/orders/{id}', [OrdersController::class, 'destroyOrder'])->name('orders.destroy');

            Route::get('/countries', [CountryController::class, 'showAll'])->name('manageCountries');
            Route::get('/countries/add', [CountryController::class, 'createCountry'])->name('countries.add');
            Route::post('/countries', [CountryController::class, 'storeCountry'])->name('countries.store');
            Route::get('/countries/{id}/edit', [CountryController::class, 'editCountry'])->name('countries.edit');
            Route::put('/countries/{id}', [CountryController::class, 'updateCountry'])->name('countries.update');
            Route::delete('/countries/{id}', [CountryController::class, 'destroyCountry'])->name('countries.destroy');
        });
    });
});

require __DIR__ . '/auth.php';

