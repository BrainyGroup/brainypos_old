@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products List</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">

                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">

                        <table class="table table-hover table-striped table-bordered table-sm">
                            <caption></caption>

                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Buy</th>
                                <th scope="col">Sell</th>


                              </tr>
                            </thead>
                            <tbody>

                  @foreach($stocks as $stock)

                              <tr>

                                <td> <a href="/$stocks/{{$stock->id}}">{{ $stock->name }}</a> </td>

                                <td><a href="/$stocks/{{$stock->id}}">{{ $stock->quantity }}</a></td>

                                <td><a href="/$stocks/{{$stock->id}}">{{ $stock->price }}</a></td>

                                <td><a class="btn btn-success btn-sm" href="/stocks/create?product_id={{ $stock->product_id }}&is_sale=0">Buy</a></td>

                                <td><a  class="btn btn-success btn-sm" href="/stocks/create?product_id={{ $stock->product_id }}&is_sale=1">Sell</a></td>

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
