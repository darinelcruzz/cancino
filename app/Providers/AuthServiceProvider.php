<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Checkup' => 'App\Policies\CheckupPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
