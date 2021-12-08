@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Sale Order</div>

                    <div class="card-body">
                        <form class="row g-3" action="{{ route('sale_orders.update', ['sale_order' => $sale_order->invoice]) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="col-md-6">
                                <label for="invoice" class="form-label">Invoice Number</label>
                                <input type="text" class="form-control @error('invoice') is-invalid @enderror" id="invoice" name="invoice" value="{{ old('invoice') ?? $sale_order->invoice }}" aria-describedby="invoiceFeedback" readonly>
                                @error('invoice')
                                <div id="invoiceFeedback" class="invalid-feedback">
                                    {{ implode($errors->get('invoice')) }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="user_name" class="form-label">User</label>
                                <input type="hidden" name="user_id" value="{{ $sale_order->user_id }}">
                                <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name"  name="user_name" value="{{ $sale_order->user->name }}" aria-describedby="user_idFeedback" disabled>
                                @error('user_id')
                                <div id="user_idFeedback" class="invalid-feedback">
                                    {{ implode($errors->get('user_id')) }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"  name="date" value="{{ old('date') ?? $sale_order->date }}" aria-describedby="user_idFeedback">
                                @error('date')
                                <div id="user_idFeedback" class="invalid-feedback">
                                    {{ implode($errors->get('date')) }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="approve" name="approve" @if($sale_order->approve) checked @endif>
                                    <label class="form-check-label" for="approve">
                                        Approve
                                    </label>
                                    @error('approve')
                                    <div id="approveFeedback" class="invalid-feedback">
                                        {{ implode($errors->get('approve')) }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('sale_orders.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
