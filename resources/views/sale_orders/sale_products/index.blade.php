@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sale Product List</div>
                    <div class="card-body">
                        <h5 class="card-title">
                            Invoice : {{ $sale_order->invoice }}<br>
                            Order : {{$sale_order->user->name}}
                        </h5>
                        <a href="{{ route('sale_orders.sale_products.create', ['sale_order' => $sale_order]) }}" class="btn btn-primary">
                            Add Sale Product
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
                            @forelse($sale_products as $sale_product)
                                <tr>
                                    <td>{{ $sale_product->product->name }}</td>
                                    <td>{{ $sale_product->quantity }}</td>
                                    <td>Rp {{ number_format($sale_product->price, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" align="center">There is no sale product</td>
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
