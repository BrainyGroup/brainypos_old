<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_details = OrderDetail::all();
        return view('order_details.index',compact('order_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order_details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Log::info('validating order_detail details');

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

        // Create new order_detail instance

        Log::info('insert order_detail deatils to the database');

        $order_detail = new OrderDetail;

        $order_detail->name = $request->name;
        $order_detail->group = $request->group;
        $order_detail->brand = $request->brand;
        $order_detail->type = $request->type;
        $order_detail->category = $request->category;
        $order_detail->description = $request->description;
        $order_detail->size = $request->size;
        $order_detail->package_unit = $request->package_unit;
        $order_detail->unit = $request->unit;
        $order_detail->package_quantity = $request->package_quantity;
        $order_detail->photo = $request->photo;

       if ($order_detail->save()){
        Log::info('Order_detail details were inserted to the database successfully');
       }else{
        Log::critical('Order_detail details were inserted to the database successfully');
       }

        return redirect()->route('order_details.index')
                        ->with('success','Order_detail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $order_detail)
    {
        return view('order_details.show',compact('order_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetail $order_detail)
    {
        return view('order_details.edit',compact('order_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderDetail $order_detail)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $order_detail->update($request->all());

        return redirect()->route('order_details.index')
                        ->with('success','Order_detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $order_detail)
    {
        $order_detail->delete();

        return redirect()->route('order_details.index')
                        ->with('success','Order_detail deleted successfully');
    }
}
