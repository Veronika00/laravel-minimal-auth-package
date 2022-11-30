<?php

namespace Pulovessy\Auth;

use Illuminate\Support\ServiceProvider;

class AuthApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }

    $this->publishes([
        __DIR__.'/Http/Controllers' => app_path('Http/Controllers/AuthController.php'),
    ]);

    public function register()
    {

    }
}


