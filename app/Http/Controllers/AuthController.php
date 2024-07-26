<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Inventry;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InventoryImport;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('admin.auth.login');
        }
    }
    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        } else {
            return view('admin.auth.register');
        }
    }
    public function loginSave(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        //    This is check users table defined in Config/Auth.php file
        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Email or password is incorrect');
        }
    }
    public function registerSave(Request $request)
    {

        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
            'gender' => ['required', 'string']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => bcrypt($request->password)
        ]);
        auth()->login($user);
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function inventory()
    {
        $data = Inventry::select('sku', DB::raw('MAX(gtin) as gtin'), DB::raw('MAX(skuID_Master) as skuID_Master'), DB::raw('MAX(yourSku) as yourSku'), DB::raw('MAX(styleID) as styleID'), DB::raw('MAX(warehouseAbbr) as warehouseAbbr'), DB::raw('MAX(skuID) as skuID'), DB::raw('MAX(qty) as qty'))
            ->groupBy('sku')
            ->orderBy('inventry_id', 'desc')
            ->paginate(20)
            ->withPath('inventory');

        return view('admin.inventory', ['inventory' => $data]);
    }

    public function single_inventory($id)
    {

        // Fetch the inventory item based on SKU with pagination
        $data = Inventry::where('sku', $id)
            ->orderBy('inventry_id', 'desc')
            ->paginate(10);

        // Fetch the SKU for the title or other use in the view
        $sku = Inventry::where('sku', $id)
            ->select('sku')
            ->first();

        // Abort with 404 if no data is found
        if (!$data->count()) {
            // abort(404);
        }

        return view('admin.single-inventory', [
            'inventory' => $data,
            'sku' => $sku
        ]);
    }

    public function download_inventory_csv()
    {
        // Fetch the inventory items
        $data = Inventry::select('*')->orderBy('inventry_id', 'desc')->get();

        // Get the current date for the CSV file name
        $currentDateTime = date('Y-m-d_H-i-s');
        $fileName = 'inventory_' . $currentDateTime . '.csv';

        // Define the headers for the CSV file
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        // Define the callback function to generate the CSV
        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Sku', 'GTIN', 'SkuID Master', 'YourSku', 'StyleID', 'WarehouseAbbr', 'SkuID', 'Qty']);

            foreach ($data as $row) {
                fputcsv($file, [
                    $row->sku,
                    $row->gtin,
                    $row->skuID_Master,
                    $row->yourSku,
                    $row->styleID,
                    $row->warehouseAbbr,
                    $row->skuID,
                    $row->qty,
                ]);
            }

            fclose($file);
        };

        // Return the streamed CSV response
        return Response::stream($callback, 200, $headers);
    }

    public function download_inventory_single_csv($id)
    {
        // Fetch the inventory items
        $data = Inventry::where('sku', $id)
            ->select('*')
            ->orderBy('inventry_id', 'desc')
            ->get();

        // Get the current date for the CSV file name
        $currentDateTime = date('Y-m-d_H-i-s');
        $fileName = 'inventory_' . $id . '_' . $currentDateTime . '.csv';

        // Define the headers for the CSV file
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        // Define the callback function to generate the CSV
        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Sku', 'GTIN', 'SkuID Master', 'YourSku', 'StyleID', 'WarehouseAbbr', 'SkuID', 'Qty']);

            foreach ($data as $row) {
                fputcsv($file, [
                    $row->sku,
                    $row->gtin,
                    $row->skuID_Master,
                    $row->yourSku,
                    $row->styleID,
                    $row->warehouseAbbr,
                    $row->skuID,
                    $row->qty,
                ]);
            }

            fclose($file);
        };

        // Return the streamed CSV response
        return Response::stream($callback, 200, $headers);
    }



    public function product()
    {
        $data = Products::select(
            'style_code',
            DB::raw('COUNT(*) as product_count'),
            DB::raw('MAX(gtin_number) as gtin_number'),
            DB::raw('MAX(sku) as sku'),
            DB::raw('MAX(description) as description'),
            DB::raw('MAX(features) as features'),
            DB::raw('MAX(piece_price) as piece_price'),
            DB::raw('MAX(dozen_price) as dozen_price'),
            DB::raw('MAX(case_price) as case_price'),
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
            DB::raw('MAX(maint_date) as maint_date')
        )
            ->groupBy('style_code')
            ->paginate(20)
            ->withPath('product');

        return view('admin.product', ['product' => $data]);
    }


    public function single_product($id)
    {

        // Fetch the inventory item based on SKU with pagination
        $data = Products::where('style_code', $id)
            ->paginate(10);

        // Fetch the SKU for the title or other use in the view
        $style_code = Products::where('style_code', $id)
            ->select('style_code')
            ->first();

        // Abort with 404 if no data is found
        if (!$data->count()) {
            abort(404);
        }

        return view('admin.single-product', [
            'product' => $data,
            'style_code' => $style_code
        ]);
    }

    public function download_product_csv()
    {
        // Fetch all columns from the products table
        $data = Products::select('*')->get();

        // Get the current date for the CSV file name
        $currentDateTime = date('Y-m-d_H-i-s');
        $fileName = 'product_' . $currentDateTime . '.csv';

        // Define the headers for the CSV file
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        // Define the callback function to generate the CSV
        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');

            // Set the header row with all columns
            fputcsv($file, [
                'company', 'sku', 'description', 'features', 'piece_price',
                'dozen_price', 'case_price', 'style_code', 'size_name', 'size_category',
                'size_code', 'color_name', 'hex_code', 'color_code', 'weight',
                'domain', 'prodDetail_image', 'prodGallery_image', 'retail_price',
                'style_number', 'gtin_number', 'max_inventory', 'closeout',
                'mill_name', 'pack_qty', 'case_qty', 'launch', 'coming_soon',
                'front_of_image_name', 'back_of_image_name', 'side_of_image_name',
                'pms_code', 'size_sort_order', 'carton_length', 'carton_width',
                'carton_height', 'maint_date'
            ]);

            // Loop through each row of data and write to the CSV
            foreach ($data as $row) {
                fputcsv($file, [
                    $row->company, $row->sku, $row->description, $row->features,
                    $row->piece_price, $row->dozen_price, $row->case_price,
                    $row->style_code, $row->size_name, $row->size_category,
                    $row->size_code, $row->color_name, $row->hex_code, $row->color_code,
                    $row->weight, $row->domain, $row->prodDetail_image,
                    $row->prodGallery_image, $row->retail_price, $row->style_number,
                    $row->gtin_number, $row->max_inventory, $row->closeout,
                    $row->mill_name, $row->pack_qty, $row->case_qty, $row->launch,
                    $row->coming_soon, $row->front_of_image_name, $row->back_of_image_name,
                    $row->side_of_image_name, $row->pms_code, $row->size_sort_order,
                    $row->carton_length, $row->carton_width, $row->carton_height,
                    $row->maint_date
                ]);
            }

            fclose($file);
        };

        // Return the streamed CSV response
        return response()->stream($callback, 200, $headers);
    }



    public function download_product_single_csv($id)
    {
        // Fetch the inventory items
        $data = Products::where('style_code', $id)
            ->select('*')
            ->get();

        // Get the current date for the CSV file name
        $currentDateTime = date('Y-m-d_H-i-s');
        $fileName = 'product_' . $id . '_' . $currentDateTime . '.csv';

        // Define the headers for the CSV file
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        // Define the callback function to generate the CSV
        $callback = function () use ($data) {
            $file = fopen('php://output', 'w');

            // Set the header row with all columns
            fputcsv($file, [
                'company', 'sku', 'description', 'features', 'piece_price',
                'dozen_price', 'case_price', 'style_code', 'size_name', 'size_category',
                'size_code', 'color_name', 'hex_code', 'color_code', 'weight',
                'domain', 'prodDetail_image', 'prodGallery_image', 'retail_price',
                'style_number', 'gtin_number', 'max_inventory', 'closeout',
                'mill_name', 'pack_qty', 'case_qty', 'launch', 'coming_soon',
                'front_of_image_name', 'back_of_image_name', 'side_of_image_name',
                'pms_code', 'size_sort_order', 'carton_length', 'carton_width',
                'carton_height', 'maint_date'
            ]);

            // Loop through each row of data and write to the CSV
            foreach ($data as $row) {
                fputcsv($file, [
                    $row->company, $row->sku, $row->description, $row->features,
                    $row->piece_price, $row->dozen_price, $row->case_price,
                    $row->style_code, $row->size_name, $row->size_category,
                    $row->size_code, $row->color_name, $row->hex_code, $row->color_code,
                    $row->weight, $row->domain, $row->prodDetail_image,
                    $row->prodGallery_image, $row->retail_price, $row->style_number,
                    $row->gtin_number, $row->max_inventory, $row->closeout,
                    $row->mill_name, $row->pack_qty, $row->case_qty, $row->launch,
                    $row->coming_soon, $row->front_of_image_name, $row->back_of_image_name,
                    $row->side_of_image_name, $row->pms_code, $row->size_sort_order,
                    $row->carton_length, $row->carton_width, $row->carton_height,
                    $row->maint_date
                ]);
            }

            fclose($file);
        };

        // Return the streamed CSV response
        return Response::stream($callback, 200, $headers);
    }


    public function productInventory()
    {
        return view('admin.update-inventory');
    }

}
