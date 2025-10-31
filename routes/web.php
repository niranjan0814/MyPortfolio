<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PasswordResetController; // ✅ ADD THIS LINE

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Password Reset Routes (Protected by a secret key)
Route::get('/admin/reset-password', [PasswordResetController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/admin/reset-password', [PasswordResetController::class, 'resetToDefault'])->name('password.reset.default');
Route::get('/project/{id}/overview', [PortfolioController::class, 'showProjectOverview'])->name('project.overview');

// ✅ DIRECT URL RESET - Simply visit this URL to reset password
Route::get('/password/login/reset', [PasswordResetController::class, 'directReset'])->name('password.direct.reset');