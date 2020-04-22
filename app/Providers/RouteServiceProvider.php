<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapAuthRoutes();
        $this->mapRefactoredRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
    protected function mapAuthRoutes()
    {
        Route::middleware(['web', 'auth'])
             ->namespace($this->namespace)
             ->group(base_path('routes/auth.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    protected function mapRefactoredRoutes()
    {
        Route::middleware(['web', 'auth'])
             ->namespace($this->namespace)
             ->group(base_path('routes/refactored.php'));
    }
}
