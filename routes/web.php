<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Halaman Pertama kali diakses (Redirect ke Login)
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('catalog');
    }
    return redirect()->route('login');
});

// Auth Routes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// User Routes (Hanya bisa diakses jika sudah login dengan role user/admin)
Route::middleware(['auth', 'role:user,admin'])->group(function () {
    Route::get('/catalog', function () {
        return view('user.catalog');
    })->name('catalog');

    Route::get('/my-orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/history', [OrderController::class, 'history'])->name('history');
});

// Admin Routes (Hanya bisa diakses jika sudah login dan rolenya admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});