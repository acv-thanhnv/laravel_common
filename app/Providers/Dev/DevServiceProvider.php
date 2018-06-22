<?php
/**
 * @author thanhnv
 */
namespace App\Providers\Dev;

use Illuminate\Support\ServiceProvider;
use App\Services\Dev\Interfaces;
use App\Services\Dev\Production;
class DevServiceProvider extends ServiceProvider
{
    protected $services = [
        Interfaces\DevServiceInterface::class => Production\DevService::class,
    ];
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
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
