@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Product</div>

                    <div class="card-body">
                        <form class="row g-3" action="{{ route('products.store') }}" method="post">
                            @csrf
                            <div class="col-md-6">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku') }}" aria-describedby="skuFeedback">
                                @error('sku')
                                <div id="skuFeedback" class="invalid-feedback">
                                    {{ implode($errors->get('sku')) }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" value="{{ old('name') }}" aria-describedby="nameFeedback">
                                @error('name')
                                <div id="nameFeedback" class="invalid-feedback">
                                    {{ implode($errors->get('name')) }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrice">Rp</span>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" aria-describedby="priceFeedback">
                                    @error('price')
                                    <div id="priceFeedback" class="invalid-feedback">
                                        {{ implode($errors->get('price')) }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
