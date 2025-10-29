<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PasswordResetController; // ✅ ADD THIS LINE

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [PortfolioController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Password Reset Routes (Protected by a secret key)
Route::get('/admin/reset-password', [PasswordResetController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/admin/reset-password', [PasswordResetController::class, 'resetToDefault'])->name('password.reset.default');