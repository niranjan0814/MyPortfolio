<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\CVController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Password Reset Routes
Route::get('/admin/reset-password', [PasswordResetController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/admin/reset-password', [PasswordResetController::class, 'resetToDefault'])->name('password.reset.default');
Route::get('/password/login/reset', [PasswordResetController::class, 'directReset'])->name('password.direct.reset');

// Project Overview
Route::get('/project/{id}/overview', [PortfolioController::class, 'showProjectOverview'])->name('project.overview');

// ====== CV Routes ======

// Admin Routes (requires authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/cv/download/{user}', [CVController::class, 'download'])->name('cv.download');
    Route::get('/cv/view/{user}', [CVController::class, 'view'])->name('cv.view');
    Route::get('/cv/my-cv/download', [CVController::class, 'downloadOwn'])->name('cv.download.own');
});

// Public Routes (for portfolio visitors)
Route::get('/cv/public/view/{userId}', [CVController::class, 'publicView'])->name('cv.public.view');
Route::get('/cv/public/download/{userId}', [CVController::class, 'publicDownload'])->name('cv.public.download');