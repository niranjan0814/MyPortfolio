<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\LandingController;

// ✅ ADD THESE ROUTES AT THE TOP
Route::get('/get-started', [LandingController::class, 'index'])
    ->name('landing.index');

Route::post('/select-theme', [LandingController::class, 'selectTheme'])
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

// 2. Optional: Make root URL redirect to first portfolio or a specific one
//     (Uncomment ONE of these options)

// Option A: Redirect root to first user in DB (good for demo/single-user mode)
Route::get('/', function () {
    return redirect('/get-started');
})->name('home');
// Option B: Keep your old index() method as fallback (for admin preview)
// Route::get('/', [PortfolioController::class, 'index'])->name('portfolio.index');

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