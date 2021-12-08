<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('products.index');
});
Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('purchase_orders',\App\Http\Controllers\PurchaseOrderController::class);
    Route::resource('sale_orders', \App\Http\Controllers\SaleOrderController::class);
    Route::resource('purchase_orders.purchase_products', \App\Http\Controllers\PurchaseOrder\PurchaseProductController::class);
    Route::resource('sale_orders.sale_products', \App\Http\Controllers\SaleOrder\SaleProductController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
