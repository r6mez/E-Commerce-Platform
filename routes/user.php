<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CheckoutController;

Route::middleware(['auth'])->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    
    Route::prefix('products')->group(function () { // in market
        Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
        Route::get('', [ProductController::class, 'index'])->name('product.index');
    });

    Route::prefix('cart')->group(function () {
        Route::post('', [CartItemController::class, 'store'])->name('cart.store');
        Route::get('', [CartItemController::class, 'index'])->name('cart.index');
        Route::delete('/{cartItem}', [CartItemController::class, 'destroy'])->name('cart.destroy');
        Route::patch('/{cartItem}', [CartItemController::class, 'update'])->name('cart.update');
        Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('cart.checkout');
    });

    Route::get('/orders', [OrdersController::class, 'index'])->name('order.index');
});