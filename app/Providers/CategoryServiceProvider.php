<?php

namespace App\Providers;

use App\Models\Products;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Using a closure based composer...
        View::composer('web.layout.header', function ($view) {
            $categories = Products::select('category')
                ->distinct()
                ->orderBy('category')
                ->pluck('category');

            $view->with('categories', $categories->chunk(6));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
