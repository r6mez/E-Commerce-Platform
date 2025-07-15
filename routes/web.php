<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureIsAdmin;
use App\Http\Middleware\IsSeller;

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
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        Route::prefix('dashboard')->group(function () {
            Route::get('/users', [UserController::class, 'index'])->name('manageUsers');
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users', [UserController::class, 'store'])->name('users.store');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
            Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

            Route::get('/countries', [CountryController::class, 'index'])->name('manageCountries');
            Route::get('/countries/add', [CountryController::class, 'create'])->name('countries.add');
            Route::post('/countries', [CountryController::class, 'store'])->name('countries.store');
            Route::get('/countries/{country}/edit', [CountryController::class, 'edit'])->name('countries.edit');
            Route::put('/countries/{country}', [CountryController::class, 'update'])->name('countries.update');
            Route::delete('/countries/{country}', [CountryController::class, 'destroy'])->name('countries.destroy');
            
            Route::delete('/products/{product}/photo/{photo}', [ProductController::class, 'destroyPhoto'])->name('products.photos.destroy');
            Route::get('/products', [ProductController::class, 'indexAll'])->name('manageProducts');
            Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
            Route::post('/products', [ProductController::class, 'store'])->name('products.store');
            Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
            Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
            Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
            Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
            
            Route::get('/orders', [OrdersController::class, 'indexAll'])->name('manageOrders');
            Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
            Route::get('/orders/{order}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
            Route::put('/orders/{order}', [OrdersController::class, 'update'])->name('orders.update');
            Route::delete('/orders/{order}', [OrdersController::class, 'destroy'])->name('orders.destroy');
        });
    });
    
    Route::middleware(IsSeller::class)->name('seller.')->group(function () {
        Route::delete('/seller/products/{product}/photo/{photo}', [ProductController::class, 'destroyPhotoForSeller'])->name('products.photos.destroy');
        Route::get('/seller/products', [ProductController::class, 'indexForSeller'])->name('products.index');
        Route::get('/seller/products/create', [ProductController::class, 'createForSeller'])->name('products.create');
        Route::post('/seller/products', [ProductController::class, 'storeForSeller'])->name('products.store');
        Route::get('/seller/products/{product}/edit', [ProductController::class, 'editForSeller'])->name('products.edit');
        Route::put('/seller/products/{product}', [ProductController::class, 'updateForSeller'])->name('products.update');
        Route::get('/seller/products/export', [SellerController::class, 'exportCSV'])->name('products.export');
        Route::get('/seller', [SellerController::class, 'index'])->name('index');
        Route::get('/seller/emailCSV/{reciver}', [SellerController::class, 'emailCSV'])->name('products.email');
    });
});

require __DIR__ . '/auth.php';

