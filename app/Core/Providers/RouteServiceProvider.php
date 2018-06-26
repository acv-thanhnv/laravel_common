<?php

namespace App\Core\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Config;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Core\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapAuthRoutes();
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        //only active in debug mode
        if(Config::get('app.debug')==true){
            $this->mapDevRoutes();
        }

    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace('App\Web\Http\Controllers')
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace('App\Api\Http\Controllers')
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "dev" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapDevRoutes()
    {
        Route::middleware('dev')
            ->namespace('App\Dev\Http\Controllers')
            ->group(base_path('routes/dev.php'));
    }
    /**
     * Define the "dev" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAuthRoutes()
    {
        Route::middleware('web')
        ->namespace('App\Auth\Http\Controllers')
            ->group(base_path('routes/auth.php'));
    }
}
