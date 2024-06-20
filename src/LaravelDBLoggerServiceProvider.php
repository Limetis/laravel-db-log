<?php

namespace Limetis\laraveldblogger;

use Illuminate\Support\ServiceProvider;
use Limetis\laraveldblogger\Loggers\MariaDbLogger;

class LaravelDBLoggerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('MariaDbLogger', function ($app) {
            return new MariaDbLogger();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations')
        ], 'migrations');

        // Publikování migrací
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}