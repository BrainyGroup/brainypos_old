<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->foreign()->references('id')->on('users');
            $table->integer('location_id')->unsigned()->foreign()->references('id')->on('locations');
            $table->decimal('amount',8,2);
            $table->decimal('vat_amount',8,2)->nullable();
            $table->decimal('total_amount',8,2);
            $table->decimal('paid',8,2)->nullable();
            $table->decimal('balance',8,2)->nullable();
            $table->boolean('is_sales'); //yes or no
            $table->integer('payment_types_id');
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
        Schema::dropIfExists('orders');
    }
}
