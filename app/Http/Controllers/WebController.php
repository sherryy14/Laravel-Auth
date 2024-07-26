<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class WebController extends Controller
{
     public function contact()
    {
        return view('web.contact');
    }

    public function home()
    {
        $millNames = ["Gildan", "Fruit Of The Loom", "Hanes", "Flexfit"];

        // Initialize arrays to store products for each mill name
        $productsByMill = [];

        foreach ($millNames as $millName) {
            $productsByMill[$millName] = Products::select(
                'products.style_code',
                DB::raw('COUNT(*) as product_count'),
                DB::raw('MAX(products.description) as description'),
                DB::raw('MIN(products.piece_price) as piece_price'),
                DB::raw('MAX(products.domain) as domain'),
                DB::raw('MAX(products.prodDetail_image) as prodDetail_image'),
                DB::raw('MAX(products.prodGallery_image) as prodGallery_image'),
                DB::raw('MAX(products.mill_name) as mill_name'),
                DB::raw('MAX(products.front_of_image_name) as front_of_image_name'),
                DB::raw('MAX(products.back_of_image_name) as back_of_image_name'),
                DB::raw('MAX(products.side_of_image_name) as side_of_image_name'),
                'brandimage.brand_image as brand_image_url'
            )
                ->leftJoin('brandimage', 'products.mill_name', '=', 'brandimage.brand_name')
                ->where('products.mill_name', $millName)
                ->groupBy('products.style_code', 'brandimage.brand_image')
                ->orderBy('products.mill_name')
                ->get();
        }

        // Fetch hex codes grouped by style_code for all products
        $styleCodes = collect($productsByMill)->flatten()->pluck('style_code')->toArray();

        $hexCodeCounts = Products::select('style_code', DB::raw('COUNT(DISTINCT hex_code) as color_count'))
            ->whereIn('style_code', $styleCodes)
            ->groupBy('style_code')
            ->get()
            ->keyBy('style_code');

        return view('web.index', [
            'productsByMill' => $productsByMill,
            'hexCodeCounts' => $hexCodeCounts
        ]);
    }


    public function error_page()
    {
        return view('web.errors.404');
    }

    // Brand Name
    public function getBrands()
    {
        $brands = Products::select('mill_name')
            ->distinct()
            ->orderBy('mill_name')
            ->get()
            ->pluck('mill_name');

        // Group brands by their starting letter
        $groupedBrands = $brands->groupBy(function ($brand) {
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

        return view('your.view.name', ['groupedBrands' => $groupedBrands]);
    }


    public function shop(Request $request, $brand = null)
    {
        if ($brand !== null) {
            $brand = urldecode($brand);
            $brand = str_replace('-', ' ', $brand);
        }

        $query = $request->input('query', null);
        if ($query === null && $brand === null) {
            session()->forget('search_results');
        }

        $products = session()->get('search_results', null);
        $targetBrands = ['Gildan', 'Fruit of the Loom', 'Hanes', 'Flexfit'];

        if ($products === null) {
            $productQuery = Products::select(
                'products.style_code',
                DB::raw('COUNT(*) as product_count'),
                DB::raw('MAX(gtin_number) as gtin_number'),
                DB::raw('MAX(sku) as sku'),
                DB::raw('MAX(description) as description'),
                DB::raw('MAX(features) as features'),
                DB::raw('MIN(piece_price) as piece_price'),
                DB::raw('MIN(dozen_price) as dozen_price'),
                DB::raw('MIN(case_price) as case_price'),
                DB::raw('MAX(size_name) as size_name'),
                DB::raw('MAX(color_name) as color_name'),
                DB::raw('MAX(hex_code) as hex_code'),
                DB::raw('MAX(weight) as weight'),
                DB::raw('MAX(domain) as domain'),
                DB::raw('MAX(prodDetail_image) as prodDetail_image'),
                DB::raw('MAX(prodGallery_image) as prodGallery_image'),
                DB::raw('MAX(retail_price) as retail_price'),
                DB::raw('MAX(style_number) as style_number'),
                DB::raw('MAX(max_inventory) as max_inventory'),
                DB::raw('MAX(closeout) as closeout'),
                DB::raw('MAX(mill_name) as mill_name'),
                DB::raw('MAX(pack_qty) as pack_qty'),
                DB::raw('MAX(case_qty) as case_qty'),
                DB::raw('MAX(launch) as launch'),
                DB::raw('MAX(coming_soon) as coming_soon'),
                DB::raw('MAX(front_of_image_name) as front_of_image_name'),
                DB::raw('MAX(back_of_image_name) as back_of_image_name'),
                DB::raw('MAX(side_of_image_name) as side_of_image_name'),
                DB::raw('MAX(pms_code) as pms_code'),
                DB::raw('MAX(size_sort_order) as size_sort_order'),
                DB::raw('MAX(carton_length) as carton_length'),
                DB::raw('MAX(carton_width) as carton_width'),
                DB::raw('MAX(carton_height) as carton_height'),
                DB::raw('MAX(maint_date) as maint_date'),
                'brandimage.brand_image  as brand_image_url'
            )
                ->leftJoin('brandimage', 'products.mill_name', '=', 'brandimage.brand_name')
                ->groupBy('products.style_code', 'brandimage.brand_image');

            // Apply brand filter if specified
            if ($brand) {
                $productQuery->where('products.mill_name', $brand);
            }

            // Apply search query filter if specified
            if ($query) {
                $productQuery->where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('products.style_code', 'LIKE', '%' . $query . '%')
                        ->orWhere('products.description', 'LIKE', '%' . $query . '%')
                        ->orWhere('products.mill_name', 'LIKE', '%' . $query . '%');
                });
            }

            // Custom sorting to prioritize target brands
            $productQuery->orderByRaw('CASE
                    WHEN products.mill_name IN ("' . implode('", "', $targetBrands) . '") THEN 1
                    ELSE 2
                END, products.mill_name');

            $products = $productQuery->paginate(24)->withPath('products');
            $products->withPath($brand ? route('shop.by.brand', ['brand' => $brand]) : route('shop'));
        } else {
            // Paginate the search results manually
            $perPage = 24;
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $currentItems = $products->slice(($currentPage - 1) * $perPage, $perPage)->values();
            $products = new LengthAwarePaginator($currentItems, $products->count(), $perPage, $currentPage, [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
            ]);
        }

        $styleCodes = $products->pluck('style_code')->toArray();

        $hexCodeCounts = Products::select('style_code', DB::raw('COUNT(DISTINCT hex_code) as color_count'))
            ->whereIn('style_code', $styleCodes)
            ->groupBy('style_code')
            ->get()
            ->keyBy('style_code');

        $categories = Products::select('category', DB::raw('COUNT(*) AS products'))
            ->groupBy('category')
            ->orderBy('products', 'DESC')
            ->get();

        return view('web.shop', [
            'product' => $products,
            'hexCodeCounts' => $hexCodeCounts,
            'brand' => $brand,
            'categories' => $categories
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('search-field');

        if (!$query) {
            return redirect()->route('shop')->with('error', 'Please enter a search term.');
        }

        $productsQuery = Products::select(
            'style_code',
            DB::raw('COUNT(*) as product_count'),
            DB::raw('MAX(gtin_number) as gtin_number'),
            DB::raw('MAX(sku) as sku'),
            DB::raw('MAX(description) as description'),
            DB::raw('MAX(features) as features'),
            DB::raw('MIN(piece_price) as piece_price'),
            DB::raw('MIN(dozen_price) as dozen_price'),
            DB::raw('MIN(case_price) as case_price'),
            DB::raw('MAX(size_name) as size_name'),
            DB::raw('MAX(color_name) as color_name'),
            DB::raw('MAX(hex_code) as hex_code'),
            DB::raw('MAX(weight) as weight'),
            DB::raw('MAX(domain) as domain'),
            DB::raw('MAX(prodDetail_image) as prodDetail_image'),
            DB::raw('MAX(prodGallery_image) as prodGallery_image'),
            DB::raw('MAX(retail_price) as retail_price'),
            DB::raw('MAX(style_number) as style_number'),
            DB::raw('MAX(max_inventory) as max_inventory'),
            DB::raw('MAX(closeout) as closeout'),
            DB::raw('MAX(mill_name) as mill_name'),
            DB::raw('MAX(pack_qty) as pack_qty'),
            DB::raw('MAX(case_qty) as case_qty'),
            DB::raw('MAX(launch) as launch'),
            DB::raw('MAX(coming_soon) as coming_soon'),
            DB::raw('MAX(front_of_image_name) as front_of_image_name'),
            DB::raw('MAX(back_of_image_name) as back_of_image_name'),
            DB::raw('MAX(side_of_image_name) as side_of_image_name'),
            DB::raw('MAX(pms_code) as pms_code'),
            DB::raw('MAX(size_sort_order) as size_sort_order'),
            DB::raw('MAX(carton_length) as carton_length'),
            DB::raw('MAX(carton_width) as carton_width'),
            DB::raw('MAX(carton_height) as carton_height'),
            DB::raw('MAX(maint_date) as maint_date'),
            'brandimage.brand_image as brand_image_url'
        )
            ->leftJoin('brandimage', 'products.mill_name', '=', 'brandimage.brand_name')
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('style_code', 'LIKE', '%' . $query . '%')
                    ->orWhere('description', 'LIKE', '%' . $query . '%')
                    ->orWhere('mill_name', 'LIKE', '%' . $query . '%');
            })
            ->groupBy('products.style_code', 'brandimage.brand_image');

        $products = $productsQuery->get();
          $categories = Products::select('category', DB::raw('COUNT(*) AS products'))
            ->groupBy('category')
            ->orderBy('products', 'DESC')
            ->get();

        if ($products->count() > 1) {
            // Store results in session
            session()->put('search_results', $products);
            return redirect()->route('shop', ['query' => $query,'categories' => $categories]);
        } elseif ($products->count() == 1) {
            $product = $products->first();
            $id = str_replace(' ', '-', strtolower($product->mill_name));
            if ($product->style_code) {
                $id .= '-' . $product->style_code;
            }
            return redirect()->route('product.detail', ['id' => $id]);
        } else {
            return redirect()->route('shop')->with('error', 'Sorry, No Results Found for "' . $query . '"');
        }
    }


    public function product_detail($id, $color = null)
    {
        if (strpos($id, '-') !== false) {
            list($mill_name, $style_code) = explode('-', $id, 2);
            $mill_name = ucwords(str_replace('-', ' ', $mill_name));
        } else {
            $mill_name = ucwords(str_replace('-', ' ', $id));
            $style_code = null;
        }

        $productQuery = Products::select(
            'products.*',
            DB::raw('COUNT(*) OVER() as product_count')
        )->where('mill_name', $mill_name);

        if ($style_code) {
            $productQuery->where('style_code', $style_code);
        }

        $product = $productQuery->first();

        if (!$product) {
            return redirect()->route('error.page')->with('error', 'Product not found.');
        }

        $hexCodeCounts = Products::select('hex_code', 'color_name', DB::raw('COUNT(*) as count'))
            ->where('mill_name', $mill_name)
            ->where('style_code', $style_code)
            ->groupBy('hex_code', 'color_name')
            ->get();

        if ($color) {
            $selectedColor = Products::where('mill_name', $mill_name)
                ->where('style_code', $style_code)
                ->where('hex_code', $color)
                ->first();

            if (!$selectedColor) {
                return redirect()->route('product.detail', ['id' => $id])->with('error', 'The selected color does not exist.');
            }
        } else {
            $firstColor = $hexCodeCounts->first();
            $selectedColor = Products::where('mill_name', $mill_name)
                ->where('style_code', $style_code)
                ->where('hex_code', $firstColor->hex_code)
                ->first();
        }

        $sizePrices = Products::select('size_name', 'piece_price', 'pack_qty', 'sku')
            ->where('mill_name', $mill_name)
            ->where('style_code', $style_code)
            ->where('hex_code', $selectedColor->hex_code)
            ->get();

        if ($sizePrices->isEmpty()) {
            return redirect()->route('error.page')->with('error', 'No size information available for the selected color.');
        }

        return view('web.product-detail', [
            'product' => $product,
            'hexCodeCounts' => $hexCodeCounts,
            'selectedColor' => $selectedColor,
            'sizePrices' => $sizePrices
        ]);
    }

    public function color_detail($id, $color)
    {
        // Split the id into mill_name and style_code
        list($mill_name, $style_code) = explode('-', $id, 2);
        $mill_name = ucwords(str_replace('-', ' ', $mill_name)); // Convert mill_name to original case

        // Fetch the product based on mill_name and style_code
        $product = Products::where('mill_name', $mill_name)
            ->where('style_code', $style_code)
            ->first();

        if (!$product) {
            abort(404);
        }

        // Fetch single color detail
        $single_color = Products::where('mill_name', $mill_name)
            ->where('style_code', $style_code)
            ->where('hex_code', 'LIKE', "%$color%")
            ->first();

        if (!$single_color) {
            return redirect()->route('product.detail', ['id' => $id])->with('error', 'The selected color does not exist.');
        }

        // Fetch color details
        $hexCodeCounts = Products::select('hex_code', 'color_name', DB::raw('COUNT(*) as count'))
            ->where('mill_name', $mill_name)
            ->where('style_code', $style_code)
            ->groupBy('hex_code', 'color_name')
            ->get();

        // Fetch size and price details
        $sizePrices = Products::select('size_name', 'piece_price', 'pack_qty', 'sku')
            ->where('mill_name', $mill_name)
            ->where('style_code', $style_code)
            ->where('hex_code', $single_color->hex_code)
            ->get();

        if ($sizePrices->isEmpty()) {
            abort(404);
        }

        return view('web.product-detail', [
            'product' => $product,
            'hexCodeCounts' => $hexCodeCounts,
            'selectedColor' => $single_color,
            'sizePrices' => $sizePrices
        ]);
    }
}
