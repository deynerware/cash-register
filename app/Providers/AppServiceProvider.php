<?php

namespace App\Providers;

use Merqueo\Logs\FileLogger;
use Merqueo\Contracts\Logger;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
                Logger::class,
                FileLogger::class
            );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
