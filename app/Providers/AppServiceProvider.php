<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TakiElias\Tablar\Tablar;

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
    public function boot(): void
    {
        view()->composer('*', function ($view) {
        $tablar = app(Tablar::class);
        $view->with('tablar', $tablar);
    });
    }
}
