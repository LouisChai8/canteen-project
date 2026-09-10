<?php

use Illuminate\Support\Facades\Route;

// homepage
Route::get('/', function () {
    return view('catalog');
})->name('catalog');

// pesanan
Route::get('/my-orders', function () {
    return view('orders');
})->name('orders');

// checkout
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

// history
Route::get('/history', function () {
    return view('history');
})->name('history');

// Untuk admin dashboard nnti
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');