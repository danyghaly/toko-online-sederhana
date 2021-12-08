@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Sale Product</div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('sale_orders.sale_products.store', ['sale_order' => $sale_order]) }}" method="post">
                            @csrf
                            <div class="col-md-6">
                                <label for="sku" class="form-label">Product</label>
                                <select id="sku" name="sku" class="form-select" aria-label="Default select example">
                                    @forelse($products as $product)
                                        <option value="{{ $product->sku }}" @if($product->sku == old('$sku')) selected @endif>{{ $product->name }}</option>
                                    @empty
                                        <option selected>There is no Product</option>
                                    @endforelse
                                </select>
                                @error('sku')
                                <div id="skuFeedback" class="invalid-feedback">
                                    {{ implode($errors->get('sku')) }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity') }}" aria-describedby="priceFeedback">
                                @error('quantity')
                                <div id="priceFeedback" class="invalid-feedback">
                                    {{ implode($errors->get('quantity')) }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" aria-describedby="priceFeedback">
                                @error('price')
                                <div id="priceFeedback" class="invalid-feedback">
                                    {{ implode($errors->get('price')) }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('sale_orders.sale_products.index', ['sale_order' => $sale_order]) }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
