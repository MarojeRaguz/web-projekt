<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\RestaurantRepositoryInterface',
            'App\Repositories\RestaurantRepository'
        );

        $this->app->bind(
            'App\Interfaces\MenuRepositoryInterface',
            'App\Repositories\MenuRepository'
        );

        $this->app->bind(
            'App\Interfaces\ReservationRepositoryInterface',
            'App\Repositories\ReservationRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
