@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sale Order List</div>

                    <div class="card-body">
                        <form action="{{ route('sale_orders.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <button class="btn btn-primary">Add Order</button>
                        </form>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($sale_orders as $sale_order)
                                <tr>
                                    <td>{{ $sale_order->invoice }}</td>
                                    <td>{{ $sale_order->user->name }}</td>
                                    <td>{{ $sale_order->approve ? 'Approved' : 'Pending' }}</td>
                                    <td>{{ $sale_order->date }}</td>
                                    <td>
                                        <form action="{{ route('sale_orders.destroy', ['sale_order' => $sale_order->invoice]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('sale_orders.sale_products.index', ['sale_order' => $sale_order->invoice]) }}" class="btn btn-primary">Show</a>
                                            @if(auth()->user()->admin)
                                                <a href="{{  route('sale_orders.edit', ['sale_order' => $sale_order])}}" class="btn btn-primary">Edit</a>
                                                <button class="btn btn btn-primary">Delete</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" align="center">There is no sale order</td></tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
