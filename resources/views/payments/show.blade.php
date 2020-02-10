@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Products</h2>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('products.index') }}"> View all products</a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">

                        <table class="table table-hover table-striped table-bordered table-sm">
                            <caption></caption>

                            <thead>
                              <tr>
                                <th scope="col">name</th>
                                <th scope="col">brand</th>


                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> Name</td>
                                    <td>{{ $product->name }}</td>
                                 </tr>

                              <tr>
                                 <td> Group</td>
                                 <td>{{ $product->group }}</td>
                              </tr>

                              <tr>
                                <td> Type</td>
                                <td>{{ $product->type }}</td>
                              </tr>

                              <tr>
                                <td> Catogory </td>
                                 <td>{{ $product->category }}</td>
                              </tr>

                              <tr>
                                <td> Brand </td>
                                <td>{{ $product->brand }}</td>
                              </tr>

                              <tr>
                                <td> Size</td>
                                <td>{{ $product->size }}</td>
                              </tr>

                              <tr>
                                <td> Package unit</td>
                                <td>{{ $product->package_unit }}</td>
                              </tr>

                              <tr>
                                <td> Package quantity </td>
                                <td>{{ $product->package_quantity }}</td>
                              </tr>

                              <tr>
                                <td> Unit</td>
                                <td>{{ $product->unit }}</td>
                              </tr>

                              <tr>
                                <td> Unit</td>
                                <td>{{ $product->unit }}</td>
                              </tr>

                              <tr>
                                <td> Description</td>
                                <td>{{ $product->description }}</td>
                              </tr>

                  </tbody>
                </table>
            </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
