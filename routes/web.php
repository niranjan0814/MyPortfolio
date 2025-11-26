<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ThemeOverviewController;


/*
|--------------------------------------------------------------------------
| LANDING PAGE ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/test-favicon', function() {
    $user = \App\Models\User::find(4); // Your user ID
    
    return [
        'favicon_path (DB)' => $user->favicon_path,
        'hasFavicon()' => $user->hasFavicon(),
        'favicon_url' => $user->favicon_url,
        'file_exists' => Storage::disk('public')->exists($user->favicon_path),
        'full_path' => storage_path('app/public/' . $user->favicon_path),
        'expected_url' => 'http://localhost:8000/storage/' . $user->favicon_path,
    ];
});
Route::get('/', [LandingPageController::class, 'index'])
    ->name('landing.index');

Route::post('/select-theme', [LandingPageController::class, 'selectTheme'])
    ->name('landing.select-theme');

/*
|--------------------------------------------------------------------------
| PUBLIC PORTFOLIO ROUTES – The heart of your multi-user system
|--------------------------------------------------------------------------
*/
// 1. Main portfolio page: /portfolio/niru → shows only that user's data
Route::get('/portfolio/{user}', [PortfolioController::class, 'show'])
    ->name('portfolio.show')
    ->where('user', '[A-Za-z0-9\-]+'); // Matches slugs only

/*
|--------------------------------------------------------------------------
| CONTACT & ENQUIRY
|--------------------------------------------------------------------------
*/
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| PROJECT OVERVIEW (public – anyone can view a project's details)
|--------------------------------------------------------------------------
*/
// Now uses project ID + ensures it belongs to the correct user in controller
Route::get('/project/{project}/overview', [PortfolioController::class, 'showProjectOverview'])
    ->name('project.overview');

/*
|--------------------------------------------------------------------------
| CV ROUTES – Public & Authenticated
|--------------------------------------------------------------------------
*/
// Authenticated user (admin area) – can manage their own CV
Route::middleware(['auth'])->group(function () {
    Route::get('/cv/download/{user}', [CVController::class, 'download'])
        ->name('cv.download');
    
    Route::get('/cv/view/{user}', [CVController::class, 'view'])
        ->name('cv.view');
    
    Route::get('/cv/my-cv/download', [CVController::class, 'downloadOwn'])
        ->name('cv.download.own');
});

// Public CV access (visitors viewing someone's portfolio)
Route::get('/cv/public/view/{user}', [CVController::class, 'publicView'])
    ->name('cv.public.view');

Route::get('/cv/public/download/{user}', [CVController::class, 'publicDownload'])
    ->name('cv.public.download');

/*
|--------------------------------------------------------------------------
| PASSWORD RESET (Admin Tools)
|--------------------------------------------------------------------------
*/
Route::get('/admin/reset-password', [PasswordResetController::class, 'showResetForm'])
    ->name('password.reset.form');

Route::post('/admin/reset-password', [PasswordResetController::class, 'resetToDefault'])
    ->name('password.reset.default');

Route::get('/password/login/reset', [PasswordResetController::class, 'directReset'])
    ->name('password.direct.reset');
// Theme Overview Routes
Route::get('/themes/{theme}/overview', [ThemeOverviewController::class, 'show'])
    ->name('themes.overview');

Route::get('/themes/{theme}/preview', [ThemeOverviewController::class, 'preview'])
    ->name('themes.preview');

Route::middleware(['auth'])->group(function () {
    Route::post('/themes/{theme}/comment', [ThemeOverviewController::class, 'storeComment'])
        ->name('themes.comment.store');
    
    Route::delete('/themes/{theme}/comment', [ThemeOverviewController::class, 'deleteComment'])
        ->name('themes.comment.delete');
    Route::post('/themes/{theme}/activate', [ThemeOverviewController::class, 'activate'])
        ->name('themes.activate');
});