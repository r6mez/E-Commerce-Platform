<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('/orders', function () {
    return view('profile.orders');
})->name('orders');


Route::get('/dashboard', function () { return view('dashboard.dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware('verified')->group(function () {
        Route::get('/manage-products', [ProductController::class, 'showAll'])->name('manageProducts');
        Route::get('/manage-users', [ProfileController::class, 'showAll'])->name('manageUsers');
        Route::get('/manage-orders', [OrdersController::class, 'showAll'])->name('manageOrders');
        Route::get('/manage-countries', [CountryController::class, 'showAll'])->name('manageCountries');

        // manage users
        Route::put('/users/{id}', [ProfileController::class, 'updateUserInfo'])->name('users.updateUserInfo');
        Route::get('/users/{id}/edit', [ProfileController::class, 'editUserInfo'])->name('users.editUserInfo');
        Route::delete('/users/{id}', [ProfileController::class, 'destroyUser'])->name('users.destroyUser');
        Route::get('/users/{id}/details', [ProfileController::class, 'showUserInfo'])->name('users.showUserInfo');
        Route::post('/users/store', [ProfileController::class, 'storeUser'])->name('users.storeUser');
        Route::get('/users/add', [ProfileController::class, 'createUser'])->name('users.add');

        // manage products
        Route::put('/products/{id}', [ProductController::class, 'updateProductInfo'])->name('products.updateProductInfo');
        Route::get('/products/{id}/edit', [ProductController::class, 'editProductInfo'])->name('products.editProductInfo');
        Route::delete('/products/{id}', [ProductController::class, 'destroyProduct'])->name('products.destroyProduct');
        Route::post('/products/store', [ProductController::class, 'storeProduct'])->name('products.storeProduct');
        Route::get('/products/add', [ProductController::class, 'createProduct'])->name('products.add');
    });
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');

    Route::post('/cart', [CartItemController::class, 'store'])->name('cart.store');
    Route::get('/cart', [CartItemController::class, 'index'])->name('cart.index');
    Route::delete('/cart/{cartItem}', [CartItemController::class, 'destroy'])->name('cart.destroy');
    Route::patch('/cart/{cartItem}', [CartItemController::class, 'update'])->name('cart.update');

    Route::post('/cart/checkout', [CheckoutController::class, 'checkout'])->name('cart.checkout');
});

require __DIR__ . '/auth.php';
