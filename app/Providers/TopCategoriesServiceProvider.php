<?php
namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Products;

class TopCategoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('web.layout.header', function ($view) {
            $topCategories = Products::select('category')
                ->groupBy('category')
                ->orderByRaw('COUNT(*) DESC')
                ->limit(5)
                ->pluck('category');

            $view->with('topCategories', $topCategories);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
