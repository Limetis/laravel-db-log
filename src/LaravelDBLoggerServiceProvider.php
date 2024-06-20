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
        // Publikování migrací
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
    }
}