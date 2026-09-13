<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Halaman Pertama kali diakses (Redirect ke Login)
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// User Routes
Route::get('/catalog', function () {
    return view('user.catalog');
})->name('catalog');

Route::get('/my-orders', [OrderController::class, 'index'])->name('orders');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/history', [OrderController::class, 'history'])->name('history');

// Admin Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');