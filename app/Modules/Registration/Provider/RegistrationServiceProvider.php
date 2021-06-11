<?php

namespace App\Modules\Registration\Provider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RegistrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Route::group(['prefix' => 'registration'], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }
}
