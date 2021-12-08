@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product List</div>

                    <div class="card-body">
                        @if(auth()->user()->admin)
                        <a class="btn btn-primary" href="{{ route('products.create') }}">Add Product</a>
                        @endif

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                @if(auth()->user()->admin)
                                <th>Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>Rp {{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->stock }}</td>
                                    @if(auth()->user()->admin)
                                    <td>
                                        <form action="{{ route('products.destroy', ['product' => $product->sku]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('products.edit', ['product' => $product->sku]) }}" class="btn btn-primary">Edit</a>
                                            <button class="btn btn btn-primary">delete</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @empty
                            <tr><td colspan=" @if(auth()->user()->admin) 5 @else 4 @endif" align="center">There is no product</td></tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
