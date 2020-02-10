<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Log::info('validating payment details');

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

        // Create new payment instance

        Log::info('insert payment deatils to the database');

        $payment = new Payment;

        $payment->name = $request->name;
        $payment->group = $request->group;
        $payment->brand = $request->brand;
        $payment->type = $request->type;
        $payment->category = $request->category;
        $payment->description = $request->description;
        $payment->size = $request->size;
        $payment->package_unit = $request->package_unit;
        $payment->unit = $request->unit;
        $payment->package_quantity = $request->package_quantity;
        $payment->photo = $request->photo;

       if ($payment->save()){
        Log::info('Payment details were inserted to the database successfully');
       }else{
        Log::critical('Payment details were inserted to the database successfully');
       }

        return redirect()->route('payments.index')
                        ->with('success','Payment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('payments.show',compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('payments.edit',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')
                        ->with('success','Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')
                        ->with('success','Payment deleted successfully');
    }
}
