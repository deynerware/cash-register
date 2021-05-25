<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Merqueo\Logs\Log;

class LogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('log', Log::class);
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
