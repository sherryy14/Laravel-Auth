<?php

namespace App\Http\Controllers;

use session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function clearSession()
    {
        session()->flush(); // This clears all session data
        return redirect()->route('cart')->with('success', 'Session cleared for debugging.');
    }

    function cart()
    {
        $cart = session()->get('cart', []);
        // Calculate subtotal
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Fetch shipping price from the database
        $shippingPrice = DB::table('shipping')->value('price');

        // Calculate the order total
        $orderTotal = $subtotal + $shippingPrice;

        // Pass data to the view
        return view('web.cart', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'shippingPrice' => $shippingPrice,
            'orderTotal' => $orderTotal
        ]);
    }

    public function cartAdd(Request $request)
    {
        $description = $request->input('description');
        $image = $request->input('image');
        $color = $request->input('color');
        $quantities = $request->input('quantities', []);
        $prices = $request->input('prices', []);
        $sizes = $request->input('sizes', []);
        $skus = $request->input('sku', []);
        $validQuantity = false;
        foreach ($quantities as $quantity) {
            if ((int)$quantity > 0) {
                $validQuantity = true;
                break;
            }
        }

        if (!$validQuantity) {
            return redirect()->back()->with(['error' => 'No quantities were found to add.']);
        }
        $cart = session()->get('cart', []);

        foreach ($skus as $sku) {
            $quantity = (int) ($quantities[$sku] ?? 0);
            $price = (float) ($prices[$sku] ?? 0);
            $size = $sizes[$sku] ?? '';

            if ($quantity > 0) {
                if (isset($cart[$sku])) {
                    // Update quantity
                    $cart[$sku]['quantity'] += $quantity;
                } else {
                    // Add new product
                    $cart[$sku] = [
                        'size' => $size,
                        'price' => $price,
                        'quantity' => $quantity,
                        'image' => $image,
                        'description' => $description,
                        'color' => $color,
                    ];
                }
            }
        }

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Products added to cart successfully.');
    }


    public function cartRemove(Request $request)
    {
        $itemId = $request->input('item_id');

        // Retrieve cart from session
        $cart = session()->get('cart', []);

        // Remove item from cart
        if (isset($cart[$itemId])) {
            unset($cart[$itemId]);
            session()->put('cart', $cart);

            // Recalculate totals
            $subtotal = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart));

            // Fetch shipping price from the database
            $shippingPrice = DB::table('shipping')->value('price');
            $cartEmpty = empty($cart);
            // Calculate the order total
            $orderTotal = $subtotal + $shippingPrice;

            return response()->json([
                'success' => true,
                'subtotal' => number_format($subtotal, 2),
                'shippingPrice' => number_format($shippingPrice, 2),
                'orderTotal' => number_format($orderTotal, 2),
                'cartEmpty' => $cartEmpty
            ]);
        }

        return response()->json(['success' => false], 404);
    }


    public function cartUpdate(Request $request)
    {
        $quantities = $request->input('quantities');

        // Log the quantities received

        // Retrieve cart from session
        $cart = session()->get('cart', []);

        // Update quantities in the cart
        foreach ($quantities as $itemId => $quantity) {
            if (isset($cart[$itemId])) {
                $cart[$itemId]['quantity'] = (int) $quantity;
                // Remove item if quantity is zero
                if ($cart[$itemId]['quantity'] <= 0) {
                    unset($cart[$itemId]);
                }
            }
        }

        // Store updated cart back to session
        session()->put('cart', $cart);

        // Recalculate totals
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $shippingPrice = DB::table('shipping')->value('price');
        $orderTotal = $subtotal + $shippingPrice;
        $totalQuantity = array_sum(array_column($cart, 'quantity'));

        // Calculate item-specific subtotals
        $itemSubtotals = [];
        foreach ($cart as $itemId => $item) {
            $itemSubtotals[$itemId] = number_format($item['price'] * $item['quantity'], 2);
        }

        return response()->json([
            'success' => true,
            'itemSubtotals' => $itemSubtotals,
            'subtotal' => number_format($subtotal, 2),
            'shippingPrice' => number_format($shippingPrice, 2),
            'orderTotal' => number_format($orderTotal, 2),
            'totalQuantity' => $totalQuantity,
            'message' => 'Cart updated successfully.'
        ]);
    }


    public function getCartTotals()
    {
        $cart = session()->get('cart', []);
        $totalQuantity = empty($cart) ? 0 : array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'totalQuantity' => $totalQuantity
        ]);
    }

    public function checkout()
    {
        // Retrieve cart from session
        $cart = session()->get('cart', []);

        // Calculate subtotal and order total
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        // Fetch shipping price from the database
        $shippingPrice = DB::table('shipping')->value('price');

        // Calculate the order total
        $orderTotal = $subtotal + $shippingPrice;

        // Prepare products list for view
        $products = [];
        foreach ($cart as $itemId => $item) {
            $products[] = [
                'image' => $item['image'],
                'size' => $item['size'],
                'name' => $item['description'], // You might want to trim this as needed
                'price' => number_format($item['price'], 2),
                'quantity' => $item['quantity'],
                'total' => number_format($item['price'] * $item['quantity'], 2),
            ];
        }

        return view('web.checkout', [
            'products' => $products,
            'subtotal' => number_format($subtotal, 2),
            'shippingPrice' => number_format($shippingPrice, 2),
            'orderTotal' => number_format($orderTotal, 2),
        ]);
    }
}
