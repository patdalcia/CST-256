<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Logger;

class LoggingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('app\Models\LoggerInterface', function($app){
           return new Logger(); 
        });
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
