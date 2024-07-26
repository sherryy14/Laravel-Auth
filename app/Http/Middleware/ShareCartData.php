<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShareCartData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $cart = session()->get('cart', []);

        // Log the cart contents
        Log::info('Cart Contents:', $cart);

        $totalQuantity = array_sum(array_column($cart, 'quantity'));

        // Log the total quantity
        Log::info('Total Quantity:', ['totalQuantity' => $totalQuantity]);

        view()->share('totalQuantity', $totalQuantity);

        return $next($request);
    }
}
