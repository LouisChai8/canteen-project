<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

// Katalog / Homepage
Route::get('/', function () {
    return view('user.catalog');
})->name('catalog');

// Group Route Pesanan via OrderController
Route::get('/my-orders', [OrderController::class, 'index'])->name('orders');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/history', [OrderController::class, 'history'])->name('history');

// Admin Dashboard (nanti)
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');