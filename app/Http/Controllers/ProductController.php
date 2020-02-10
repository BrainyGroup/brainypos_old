<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Log::info('validating product details');

        // Validate the request...
        $this->validate(request(),[
            'name' => 'required',
            'group' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'category' => 'required',
            'description' => 'required',
            'size' => 'required',
            'package_unit' => 'required',
            'unit' => 'required',
            'package_quantity' => 'required',
            'photo' => 'required'
          ]);

        // Create new product instance

        Log::info('insert product deatils to the database');

        $product = new Product;

        $product->name = $request->name;
        $product->group = $request->group;
        $product->brand = $request->brand;
        $product->type = $request->type;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->size = $request->size;
        $product->package_unit = $request->package_unit;
        $product->unit = $request->unit;
        $product->package_quantity = $request->package_quantity;
        $product->photo = $request->photo;

       if ($product->save()){
        Log::info('Product details were inserted to the database successfully');
       }else{
        Log::critical('Product details were inserted to the database successfully');
       }

        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
