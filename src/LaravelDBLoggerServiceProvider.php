<?php

namespace Limetis\LaravelDBLogger;

use Illuminate\Support\ServiceProvider;

class LaravelDBLoggerServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Registrace balíčku
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