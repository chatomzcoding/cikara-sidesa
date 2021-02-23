<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CikaraServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/Cikara/bilangan.php';
        require_once app_path() . '/Helpers/Cikara/waktu.php';
        require_once app_path() . '/Helpers/Cikara/db.php';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
