<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Products;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Use a closure based composer to share the groupedBrands variable with the header view
        View::composer('web.layout.header', function ($view) {
            $brands = Products::select('mill_name')
                ->distinct()
                ->orderBy('mill_name')
                ->get()
                ->pluck('mill_name');

            $groupedBrands = $brands->groupBy(function($brand) {
                $firstLetter = strtoupper(substr($brand, 0, 1));
                if (in_array($firstLetter, ['A'])) {
                    return 'A';
                } elseif (in_array($firstLetter, ['B', 'C'])) {
                    return 'B-C';
                } elseif (in_array($firstLetter, ['D', 'E', 'F', 'G'])) {
                    return 'D-G';
                } elseif (in_array($firstLetter, ['H', 'I', 'J', 'K', 'L', 'M'])) {
                    return 'H-M';
                } elseif (in_array($firstLetter, ['N', 'O', 'P', 'Q', 'R'])) {
                    return 'N-R';
                } else {
                    return 'S-Z';
                }
            });

            $view->with('groupedBrands', $groupedBrands);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
