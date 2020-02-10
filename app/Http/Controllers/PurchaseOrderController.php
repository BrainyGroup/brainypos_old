<?php

namespace App\Http\Controllers;

use App\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_orders = PurchaseOrder::all();
        return view('purchase_orders.index',compact('purchase_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchase_orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Log::info('validating purchase_order details');

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

        // Create new purchase_order instance

        Log::info('insert purchase_order deatils to the database');

        $purchase_order = new PurchaseOrder;

        $purchase_order->name = $request->name;
        $purchase_order->group = $request->group;
        $purchase_order->brand = $request->brand;
        $purchase_order->type = $request->type;
        $purchase_order->category = $request->category;
        $purchase_order->description = $request->description;
        $purchase_order->size = $request->size;
        $purchase_order->package_unit = $request->package_unit;
        $purchase_order->unit = $request->unit;
        $purchase_order->package_quantity = $request->package_quantity;
        $purchase_order->photo = $request->photo;

       if ($purchase_order->save()){
        Log::info('Purchase_order details were inserted to the database successfully');
       }else{
        Log::critical('Purchase_order details were inserted to the database successfully');
       }

        return redirect()->route('purchase_orders.index')
                        ->with('success','Purchase_order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchase_order)
    {
        return view('purchase_orders.show',compact('purchase_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchase_order)
    {
        return view('purchase_orders.edit',compact('purchase_order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchase_order)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $purchase_order->update($request->all());

        return redirect()->route('purchase_orders.index')
                        ->with('success','Purchase_order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchase_order)
    {
        $purchase_order->delete();

        return redirect()->route('purchase_orders.index')
                        ->with('success','Purchase_order deleted successfully');
    }
}
