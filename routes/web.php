<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('/');

require __DIR__ . '/auth.php';
require __DIR__ . '/user.php';
require __DIR__ . '/seller.php';
require __DIR__ . '/dashboard.php';

