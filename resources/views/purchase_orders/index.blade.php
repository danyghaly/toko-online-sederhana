@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Purchase Order List</div>

                    <div class="card-body">
                        <form action="{{ route('purchase_orders.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <button class="btn btn-primary">Add Order</button>
                        </form>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($purchase_orders as $purchase_order)
                                <tr>
                                    <td>{{ $purchase_order->invoice }}</td>
                                    <td>{{ $purchase_order->user->name }}</td>
                                    <td>{{ $purchase_order->date }}</td>
                                    <td>
                                        <form action="{{ route('purchase_orders.destroy', ['purchase_order' => $purchase_order->invoice]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('purchase_orders.purchase_products.index', ['purchase_order' => $purchase_order->invoice]) }}" class="btn btn-primary">Show</a>
                                            <a href="{{ route('purchase_orders.edit',['purchase_order' => $purchase_order->invoice]) }}" class="btn btn-primary">Edit</a>
                                            <button class="btn btn btn-primary">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" align="center">There is no product order</td></tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
