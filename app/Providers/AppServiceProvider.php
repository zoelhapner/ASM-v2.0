<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TakiElias\Tablar\Tablar;
use Illuminate\Support\Facades\View;
use App\Models\LicenseNotification;
use Illuminate\Support\Facades\Auth;

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

        view()->composer('*', function ($view) {
        $user = Auth::user();
        if (!$user) {
            $view->with('notifications', collect());
            return;
        }

        $activeLicenseId = session('active_license_id');

        $query = LicenseNotification::where('read', false)
            ->latest()
            ->take(5);

        if ($user->hasRole('Super-Admin')) {
            $notifications = $query->get();
        } elseif ($user->hasRole('Pemilik Lisensi')) {
            $notifications = $query
                ->whereIn('license_id', $user->licenses->pluck('id'))
                ->get();
        } else {
            $notifications = $query
                ->where('license_id', $activeLicenseId)
                ->get();
        }

        $view->with('notifications', $notifications);
    });
   
    }
}
