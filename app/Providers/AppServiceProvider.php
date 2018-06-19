<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Dev\Interfaces;
use App\Services\Dev\Production;
class AppServiceProvider extends ServiceProvider
{
    protected $services = [
        Interfaces\DevServiceInterface::class => Production\DevService::class,
    ];
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register services
        foreach ($this->services as $inteface => $service) {
            $this->app->singleton($inteface, $service);
        }
    }
}
