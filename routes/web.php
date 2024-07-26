<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginSave', [AuthController::class, 'loginSave'])->name('login.save');
// Route::get('/register',[AuthController::class,'register'])->name('register');
// Route::post('/registerSave',[AuthController::class,'registerSave'])->name('register.save');


// ------------- Dashboard -------------------
Route::middleware(['IsValidUser', 'prevent-back-history'])->group(function () {
    Route::get('/admin', [AuthController::class, 'dashboard'])->name('dashboard');
    // Inventory
    Route::get('/admin/inventory', [AuthController::class, 'inventory'])->name('inventory.view');
    Route::get('/admin/inventory/{id}', [AuthController::class, 'single_inventory'])->name('inventory.single');
    Route::get('/admin/inventory/download/csv', [AuthController::class, 'download_inventory_csv'])->name('download_inventory_csv');
    Route::get('/admin/inventory/download/csv/{id}', [AuthController::class, 'download_inventory_single_csv'])->name('download_inventory_single_csv');

    // products
    Route::get('/admin/product', [AuthController::class, 'product'])->name('product.view');
    Route::get('/admin/product/{id}', [AuthController::class, 'single_product'])->name('product.single');
    Route::get('/admin/product/download/csv', [AuthController::class, 'download_product_csv'])->name('download_product_csv');
    Route::get('/admin/product/download/csv/{id}', [AuthController::class, 'download_product_single_csv'])->name('download_product_single_csv');
    // Update Product Inventory
    Route::get('/admin/product-inventory', [AuthController::class, 'productInventory'])->name('product-inventory.view');
    Route::post('/admin/update-inventory', [AuthController::class, 'updateInventory'])->name('update.inventory');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


// ------------- Website -------------------
Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('/products/{brand?}', [WebController::class, 'shop'])->name('shop');
Route::get('/brand/{brand}', [WebController::class, 'shop'])->name('shop.by.brand');
Route::get('/product/{id}', [WebController::class, 'product_detail'])->name('product.detail');
Route::get('/product/{id}/{color?}', [WebController::class, 'color_detail'])->name('product.color_detail');
Route::post('/search', [WebController::class, 'search'])->name('product.search');

Route::get('/contact', [WebController::class, 'contact'])->name('contact');

// Cart and Checkout
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart', [CartController::class, 'cartAdd'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'cartRemove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::get('/cart/totals', [CartController::class, 'getCartTotals'])->name('cart.getTotals');

// Route::get('/clear-session', [CartController::class, 'clearSession'])->name('clear.session');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');


// Subscriber
Route::post('/subscribers', [SubscriptionController::class, 'subscribe'])->name('subscribers');





// Error Page
Route::get('/404', [WebController::class, 'error_page'])->name('error.page');
