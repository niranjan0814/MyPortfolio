<?php

namespace App\Providers;

use App\Http\Responses\LoginResponse;
use App\Http\Responses\LogoutResponse;
use App\Http\Responses\RegistrationResponse;
use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse as RegistrationResponseContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoginResponseContract::class, \App\Http\Responses\LoginResponse::class);
        $this->app->bind(LogoutResponseContract::class, \App\Http\Responses\LogoutResponse::class);
        $this->app->bind(RegistrationResponseContract::class, \App\Http\Responses\RegistrationResponse::class);
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
