<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::share('flash', function () {
            if (Session::get('status') === 'profile-information-updated') {
                return ['status' => 'Perfil actualizado correctamente.'];
            }
            if (Session::get('status') === 'password-updated') {
                return ['status' => 'Contraseña actualizada correctamente.'];
            }
            return ['status' => Session::get('status')];
        });
    }
}
