<?php

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
});

require __DIR__ . '/auth.php';