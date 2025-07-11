<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    $products = Product::take(6)->get(); 
    $categories = Category::all(); 

    foreach ($products as $product) {
        $product->price = $product->price * $product->user->country->usd_value;
    }

    return view('welcome', compact('products', 'categories'));
})->name('/');

Route::get('/orders', function () {
    return view('profile.orders');
})->name('orders');

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
});

require __DIR__ . '/auth.php';