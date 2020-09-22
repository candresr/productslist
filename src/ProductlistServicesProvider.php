<?php

namespace Candresr\Productlist;

use Illuminate\Support\ServiceProvider;

class ProductlistServicesProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'products');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/candresr/productlist'),
        ]);
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Candresr\Productlist\ProductlistController');
        $this->app->make('Candresr\Productlist\ConexionController');
    }

}
