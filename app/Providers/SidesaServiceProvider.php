<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SidesaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/Sidesa/list.php';
        require_once app_path() . '/Helpers/Sidesa/sistem.php';
        require_once app_path() . '/Helpers/Sidesa/view.php';
        require_once app_path() . '/Helpers/Sidesa/menu.php';
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
