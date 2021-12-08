@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Purchase Order Show</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            Invoice : {{ $purchase_order->invoice }}<br>
                            Order : {{$purchase_order->user->name}}
                        </h5>
                        <a href="{{ route('purchase_orders.purchase_products.create', ['purchase_order' => $purchase_order]) }}" class="btn btn-primary">
                            Add Purchase Product
                        </a>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($purchase_products as $purchase_product)
                                <tr>
                                    <td>{{ $purchase_product->product->name }}</td>
                                    <td>{{ $purchase_product->quantity }}</td>
                                    <td>Rp {{ number_format($purchase_product->price, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" align="center">There is no purchase product</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
