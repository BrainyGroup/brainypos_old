<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->foreign()->references('id')->on('products');
            $table->integer('quantity');
            $table->decimal('price');
            $table->decimal('amount',8,2);
            $table->decimal('vat_amount',8,2)->nullable();
            $table->decimal('total_amount',8,2);
            $table->decimal('paid',8,2)->nullable();
            $table->decimal('balance',8,2)->nullable();
            $table->boolean('is_sales'); //yes or no
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
        Schema::dropIfExists('order_details');
    }
}
