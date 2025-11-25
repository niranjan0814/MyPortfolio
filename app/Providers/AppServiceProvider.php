<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    view()->composer('*', function ($view) {
        if (auth()->check()) {
            $view->with('authUser', auth()->user());
        }
    });
}

}
