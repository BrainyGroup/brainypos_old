<?php

namespace App\Http\Controllers;

use App\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_types = PaymentType::all();
        return view('payment_types.index',compact('payment_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Log::info('validating payment_type details');

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

        // Create new payment_type instance

        Log::info('insert payment_type deatils to the database');

        $payment_type = new PaymentType;

        $payment_type->name = $request->name;
        $payment_type->group = $request->group;
        $payment_type->brand = $request->brand;
        $payment_type->type = $request->type;
        $payment_type->category = $request->category;
        $payment_type->description = $request->description;
        $payment_type->size = $request->size;
        $payment_type->package_unit = $request->package_unit;
        $payment_type->unit = $request->unit;
        $payment_type->package_quantity = $request->package_quantity;
        $payment_type->photo = $request->photo;

       if ($payment_type->save()){
        Log::info('Payment_type details were inserted to the database successfully');
       }else{
        Log::critical('Payment_type details were inserted to the database successfully');
       }

        return redirect()->route('payment_types.index')
                        ->with('success','Payment_type created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentType $payment_type)
    {
        return view('payment_types.show',compact('payment_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentType $payment_type)
    {
        return view('payment_types.edit',compact('payment_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentType $payment_type)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $payment_type->update($request->all());

        return redirect()->route('payment_types.index')
                        ->with('success','Payment_type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentType  $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentType $payment_type)
    {
        $payment_type->delete();

        return redirect()->route('payment_types.index')
                        ->with('success','Payment_type deleted successfully');
    }
}
