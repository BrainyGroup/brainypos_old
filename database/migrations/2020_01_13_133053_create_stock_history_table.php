<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('is_in');
            $table->string('payment_type');
            $table->string('paid_by');
            $table->decimal('cost', 8, 2);
            $table->decimal('price', 8, 2);
            $table->decimal('cost_amount',8,2);
            $table->decimal('sale_amount',8,2);
            $table->string('location_barcode')->nullable();
            $table->string('location_rfid')->nullable();
            $table->integer('location_id')->unsigned()->foreign()->references('id')->on('locations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_history');
    }
}
