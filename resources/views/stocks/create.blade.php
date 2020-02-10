@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                @if ( $is_sale)

                <div class="card-header">
                    {{ __('pos.stock sell') }} {{ $product->name }} {{ __('pos.stock available qty') }} {{ $stock->quantity }} {{ __('pos.stock price') }} {{ $stock->price }}
                </div>

                <div class="card-body">


                    <form method="POST" action="{{ route('stocks.store') }}">
                        @csrf

                        <input name="product_id" type="hidden" value="{{ $product->id }}">


                        <input name="is_sale" type="hidden" value="{{ $is_sale }}">

                        <input name="cost" type="hidden" value="{{ $stock->cost }}">


                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('pos.stock quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity1" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>

                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('pos.stock price') }}</label>

                            <div class="col-md-6">
                                <input id="price1" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $stock->price }}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="current_amount" class="col-md-4 col-form-label text-md-right">{{ __('pos.stock current amount') }}</label>

                            <div class="col-md-6">
                                <input id="current_amount1" type="text" class="form-control @error('current_amount') is-invalid @enderror" name="current_amount" value="{{ old('current_amount') }}" readonly>

                                @error('current_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="reorder_level" class="col-md-4 col-form-label text-md-right">{{ __('pos.stock reorder_level') }}</label>

                            <div class="col-md-6">
                                <input id="reorder_level1" type="text" class="form-control @error('reorder_level') is-invalid @enderror" name="reorder_level" value="{{ $stock->reorder_level }}" readonly>

                                @error('reorder_level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('pos.stock sell') }}
                                </button>
                            </div>
                        </div>
                    </form>

                @else


                <div class="card-header">{{ __('pos.stock add for') }} {{ $product->name }}</div>

                <div class="card-body">

                <form method="POST" action="{{ route('stocks.store') }}">
                    @csrf

                    <input name="product_id" type="hidden" value="{{ $product->id }}">


                    <input name="is_sale" type="hidden" value="{{ $is_sale }}">


                    <div class="form-group row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('pos.stock quantity') }}</label>

                        <div class="col-md-6">
                            <input id="quantity" type="text" onchange="calculate()" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>

                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cost" class="col-md-4 col-form-label text-md-right">{{ __('pos.stock cost') }}</label>

                        <div class="col-md-6">
                            <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" value="{{ old('cost') }}" required autocomplete="cost" autofocus>

                            @error('cost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('pos.stock price') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="reorder_level" class="col-md-4 col-form-label text-md-right">{{ __('pos.stock reorder_level') }}</label>

                        <div class="col-md-6">
                            <input id="reorder_level" type="text" class="form-control @error('reorder_level') is-invalid @enderror" name="reorder_level" value="{{ old('reorder_level') }}" required autocomplete="reorder_level" autofocus>

                            @error('reorder_level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="current_amount" class="col-md-4 col-form-label text-md-right">{{ __('pos.stock current amount') }}</label>

                        <div class="col-md-6">
                            <input id="current_amount" type="text" class="form-control @error('current_amount') is-invalid @enderror" name="current_amount" value="{{ old('current_amount') }}" required autocomplete="current_amount" autofocus>

                            @error('current_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('pos.stock add') }}
                            </button>
                        </div>
                    </div>
                </form>

                @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function calculate(){
        var quantity = document.getElementById('quantity1').value;
        var price = document.getElementById('price1').value;

        var amount = parseFloat(price) * parseFloat(quantity);

        document.getElementById('current_amount1').value = amount;
    }
</script>
