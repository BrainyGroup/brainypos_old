<?php

namespace App\Http\Controllers;

use App\SaleOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SaleOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_orders = SaleOrder::all();
        return view('sale_orders.index',compact('sale_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales_orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Log::info('validating sale_order details');

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

        // Create new sale_order instance

        Log::info('insert sale_order deatils to the database');

        $sale_order = new SaleOrder;

        $sale_order->name = $request->name;
        $sale_order->group = $request->group;
        $sale_order->brand = $request->brand;
        $sale_order->type = $request->type;
        $sale_order->category = $request->category;
        $sale_order->description = $request->description;
        $sale_order->size = $request->size;
        $sale_order->package_unit = $request->package_unit;
        $sale_order->unit = $request->unit;
        $sale_order->package_quantity = $request->package_quantity;
        $sale_order->photo = $request->photo;

       if ($sale_order->save()){
        Log::info('Sale_order details were inserted to the database successfully');
       }else{
        Log::critical('Sale_order details were inserted to the database successfully');
       }

        return redirect()->route('sale_orders.index')
                        ->with('success','Sale_order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function show(SaleOrder $saleOrder)
    {
        return view('sale_orders.show',compact('sale_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleOrder $saleOrder)
    {
        return view('sale_orders.edit',compact('sale_order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleOrder $sale_order)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $sale_order->update($request->all());

        return redirect()->route('sale_orders.index')
                        ->with('success','Sale_order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SaleOrder  $saleOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleOrder $sale_order)
    {
        $sale_order->delete();

        return redirect()->route('sale_orders.index')
                        ->with('success','Sale_order deleted successfully');
    }
}
