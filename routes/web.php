<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('/orders', function () {
    return view('profile.orders');
})->name('orders');


Route::get('/dashboard', function () { return view('dashboard.dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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