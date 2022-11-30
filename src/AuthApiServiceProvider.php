<?php

namespace Pulovessy\Auth;

use Illuminate\Support\ServiceProvider;

class AuthApiServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }

    public function register()
    {

    }
}


