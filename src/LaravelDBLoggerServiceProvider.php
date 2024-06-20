<?php

namespace Limetis\LaravelDBLogger;

use Illuminate\Support\ServiceProvider;
use Limetis\LaravelDBLogger\Loggers\MariaDbLogger;

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