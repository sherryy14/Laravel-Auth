<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BrandServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $brands = [
                ['name' => 'Gildan', 'route' => route('shop.by.brand', ['brand' => 'gildan'])],
                ['name' => 'Fruit Of The Loom', 'route' => route('shop.by.brand', ['brand' => 'fruit-of-the-loom'])],
                ['name' => 'Hanes', 'route' => route('shop.by.brand', ['brand' => 'hanes'])],
                ['name' => 'Flexfit', 'route' => route('shop.by.brand', ['brand' => 'flexfit'])],
            ];

            $view->with('brands', $brands);
        });
    }
}
