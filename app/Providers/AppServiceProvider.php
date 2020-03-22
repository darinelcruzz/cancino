<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Composers\StoresComposer;
use App\Employer;
use App\Observers\EmployerObserver;

class AppServiceProvider extends ServiceProvider
{
    function boot()
    {
        $this->publishes([
            base_path() . '\vendor\almasaeed2010\adminlte\bower_components'
            => public_path('adminlte/bower_components'),
            base_path() . '\vendor\almasaeed2010\adminlte\dist'
            => public_path('adminlte/dist'),
            base_path() . '\vendor\almasaeed2010\adminlte\plugins'
            => public_path('adminlte/plugins'), ], 'adminlte');

        View::composer('*', StoresComposer::class);

        Employer::observe(EmployerObserver::class);
    }

    function register()
    {
        //
    }
}
