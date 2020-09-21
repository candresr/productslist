<?php

namespace Candresr\Productslist;

use Illuminate\Support\ServiceProvider;

class ProductslistServicesProvider extends ServiceProvider
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
            __DIR__.'/views' => base_path('resources/views/candresr/productslist'),
        ]);
    }


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('candresr\productslist\ProductslistController');
    }

}
