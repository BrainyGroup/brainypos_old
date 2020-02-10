@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Products</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="table-responsive">

                        <table class="table table-hover table-striped table-bordered table-sm">
                            <caption></caption>

                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Type</th>
                                <th scope="col">Stock</th>


                              </tr>
                            </thead>
                            <tbody>

                  @foreach($products as $product)

                              <tr>

                                <td> <a href="/products/{{$product->id}}">{{ $product->name }}</a> </td>

                                <td><a href="/products/{{$product->id}}">{{ $product->brand }}</a></td>

                                <td><a href="/products/{{$product->id}}">{{ $product->type}}</a></td>

                                <td><a href="/stocks/create?product_id={{ $product->id }}">{{ $product->name}}</a></td>

                              </tr>


                    @endforeach

                  </tbody>
                </table>
            </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
