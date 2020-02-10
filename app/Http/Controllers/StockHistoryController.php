<?php

namespace App\Http\Controllers;

use App\StockHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class StockHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock_history = StockHistory::all();
        return view('stock_history.index',compact('stock_history'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock_history.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Log::info('validating stock_history details');

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

        // Create new stock_history instance

        DB::table('stock_histories')->insert([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'cost' => $request->cost,
            'price' => $request->price,
            'payment_type' => $request->payment_type,
            'paid_by' => $request->paid_by,
            'is_in' => $request->is_in,
            'cost_amount' => $request->cost_amount,
            'sale_amount' => $request->sale_amount,
            'location_barcode' => $request->location_barcode,
            'location_rfid' => $request->location_rfid,
            'location_id' => $request->location_id]
        );

        Log::info('insert stock_history deatils to the database');

        return redirect()->route('stock_historys.index')
                        ->with('success','Stock_history created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockHistory  $stockHistory
     * @return \Illuminate\Http\Response
     */
    public function show(StockHistory $stockHistory)
    {
        return view('stock_historys.show',compact('stock_history'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockHistory  $stockHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(StockHistory $stockHistory)
    {
        return view('stock_historys.edit',compact('stock_history'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockHistory  $stockHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockHistory $stock_history)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $stock_history->update($request->all());

        return redirect()->route('stock_historys.index')
                        ->with('success','Stock_history updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockHistory  $stockHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockHistory $stock_history)
    {
        $stock_history->delete();

        return redirect()->route('stock_historys.index')
                        ->with('success','Stock_history deleted successfully');
    }
}
