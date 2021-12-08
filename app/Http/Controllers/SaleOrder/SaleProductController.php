<?php

namespace App\Http\Controllers\SaleOrder;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SaleOrder;
use App\Models\SaleProduct;
use Illuminate\Http\Request;

class SaleProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(SaleProduct::class, 'sale_product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SaleOrder $saleOrder)
    {
        return response()->view('sale_orders.sale_products.index', [
            'sale_order' => $saleOrder,
            'sale_products' => $saleOrder->saleProducts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SaleOrder $saleOrder)
    {
        $products = Product::all();

        return response()->view('sale_orders.sale_products.create', [
            'sale_order' => $saleOrder,
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleOrder $saleOrder, Request $request)
    {
        $request->validate([
            'sku' => ['required', 'string', 'exists:products,sku'],
            'quantity' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:0'],
        ]);

        $saleProduct = new SaleProduct([
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
        $saleOrder->saleProducts()->save($saleProduct);

        return response()->redirectToRoute('sale_orders.sale_products.index', [
            'sale_order' => $saleOrder,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
