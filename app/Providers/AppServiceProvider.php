<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Composers\StoresComposer;
use App\{Employer, Check, SupplySale, SupplyPurchase, SupplyMovement};
use App\Observers\{EmployerObserver, CheckObserver, SupplySaleObserver, SupplyPurchaseObserver, SupplyMovementObserver};

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

        $this->registerObservers();
    }

    function register()
    {
        //
    }

    function registerObservers()
    {
        Employer::observe(EmployerObserver::class);
        Check::observe(CheckObserver::class);
        SupplySale::observe(SupplySaleObserver::class);
        SupplyPurchase::observe(SupplyPurchaseObserver::class);
        SupplyMovement::observe(SupplyMovementObserver::class);
    }
}
