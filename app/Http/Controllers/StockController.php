<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Product;
use App\StockHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = DB::table('stocks')
            ->join('products', 'products.id', '=', 'stocks.product_id')
            ->select('stocks.*', 'products.name')
            ->get();

        return view('stocks.index',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $is_sale = $request->is_sale;

        $stock = Stock::where('product_id',request('product_id'))->first();

        $product = Product::find(request('product_id'));
        return view('stocks.create', compact('product','is_sale','stock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // $this->validate(request(),[
        //     'quantity' => 'required',
        //     'cost' => 'required',
        //     'price' => 'required',
        //     'reorder_level' => 'required',
        //     'current_amount' => 'required'
        //   ]);

         // dd( $request->product_id);

        // If there's a flight from Oakland to San Diego, set the price to $99.
        // If no matching model exists, create one.

        // DB::transaction(function () {
        //     $lastPayId = DB::table('pays')->insertGetId([]);
        // });

        $stock = Stock::find($request->product_id);



        // if ($stock){
        //     $quantity = $stock->quantity + $request->quantity;
        // }else{
        //     $quantity = $request->quantity;
        // }


        if ($request->is_sale){

            if ($stock->quantity >= $request->quantity){
                $quantity = $stock->quantity - $request->quantity;
                $is_in = 0;
            }else{
                $message = "Remaining stock is less than requested stock";
            }

        }else{
            if ($stock){
                $quantity = $stock->quantity + $request->quantity;
                $is_in = 1;
            }else{
                $quantity = $request->quantity;
                $is_in = 1;
            }

        }


        $current_sales_amount = $quantity * $request->price;

        $current_cost_amount = $quantity * $request->cost;

        DB::table('stocks')->updateOrInsert(
            ['product_id' => $request->product_id],
            ['product_id' => $request->product_id,'quantity' => $quantity, 'cost' => $request->cost, 'price' => $request->price, 'reorder_level' => $request->reorder_level,  'current_amount' => $current_sales_amount]
        );

        DB::table('stock_history')->insert([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'cost' => $request->cost,
            'price' => $request->price,
            'payment_type' => $request->payment_type,
            'paid_by' => $request->paid_by,
            'is_in' => $is_in,
            'cost_amount' => $current_cost_amount,
            'sale_amount' => $current_sales_amount,
            'location_barcode' => $request->location_barcode,
            'location_rfid' => $request->location_rfid,
            'location_id' => $request->location_id]
        );



        // $stock = Stock::updateOrCreate(
        //     ['product_id' => $request->product_id],
        //     ['product_id' => $request->product_id,'quantity' => $quantity, 'cost' => $request->cost, 'price' => $request->price, 'reorder_level' => $request->reorder_level,  'current_amount' => $current_sales_amount]
        // );

        return redirect()->route('stocks.index')
                        ->with('success','Stock updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        return view('stocks.show',compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        return view('stocks.edit',compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $stock->update($request->all());

        return redirect()->route('stocks.index')
                        ->with('success','Stock updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->route('stocks.index')
                        ->with('success','Stock deleted successfully');
    }
}
