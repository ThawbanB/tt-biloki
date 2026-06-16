<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('Auth');
})->name('Auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::delete('/delete-user/{id}', [AuthController::class, 'delete'])->name('delete-user');

Route::get('/create-product', [ProductController::class, 'index'])->name('create-product');
Route::post('/create-product', [ProductController::class, 'store'])->name('store-product');
Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete-product');
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('update-product');