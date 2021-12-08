<?php

namespace App\Http\Controllers\PurchaseOrder;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\PurchaseProduct;
use Illuminate\Http\Request;

class PurchaseProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(PurchaseProduct::class, 'purchase_product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PurchaseOrder $purchaseOrder)
    {
        return response()->view('purchase_orders.purchase_products.index', [
            'purchase_order' => $purchaseOrder,
            'purchase_products' => $purchaseOrder->purchaseProducts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PurchaseOrder $purchaseOrder)
    {
        $products = Product::all();

        return response()->view('purchase_orders.purchase_products.create', [
            'purchase_order' => $purchaseOrder,
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseOrder $purchaseOrder, Request $request)
    {
        $request->validate([
            'sku' => ['required', 'string', 'exists:products,sku'],
            'quantity' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'integer', 'min:0'],
        ]);

        $purchaseProduct = new PurchaseProduct([
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
        $purchaseOrder->purchaseProducts()->save($purchaseProduct);

        return response()->redirectToRoute('purchase_orders.purchase_products.index', [
            'purchase_order' => $purchaseOrder,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseProduct  $purchaseProduct
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseProduct $purchaseProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseProduct  $purchaseProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseProduct $purchaseProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseProduct  $purchaseProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseProduct $purchaseProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseProduct  $purchaseProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseProduct $purchaseProduct)
    {
        //
    }
}
