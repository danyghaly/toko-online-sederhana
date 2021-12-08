<?php

namespace App\Http\Controllers;

use App\Models\SaleOrder;
use App\Models\User;
use Illuminate\Http\Request;

class SaleOrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(SaleOrder::class, 'sale_order');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale_orders = SaleOrder::all();

        return response()->view('sale_orders.index', ['sale_orders' => $sale_orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer', 'exists:users,id']
        ]);
        $user = User::find($request->user_id);
        $sale_order = new SaleOrder([
            'user_id' => $request->user_id,
            'approve' => $user->admin,
            'date' => today()->toDateString(),
        ]);
        $sale_order->save();

        return response()->redirectToRoute('sale_orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function show(SaleOrder $saleOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleOrder $saleOrder)
    {
        return response()->view('sale_orders.edit', ['sale_order' => $saleOrder]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleOrder $saleOrder)
    {
        $request->validate([
            'date' => ['required', 'date'],
            'approve' => ['nullable', 'boolean'],
        ]);

        $saleOrder->date = $request->date;
        $saleOrder->approve = $request->approve ? true : false;
        $saleOrder->save();

        return response()->redirectToRoute('sale_orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleOrder $saleOrder)
    {
        $saleOrder->delete();

        return response()->redirectToRoute('sale_orders.index');
    }
}
