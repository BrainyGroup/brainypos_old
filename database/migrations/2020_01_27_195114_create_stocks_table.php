<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->integer('user_id')->unsigned()->foreign()->references('id')->on('users');
            $table->decimal('cost', 8, 2);
            $table->decimal('price', 8, 2);
            $table->integer('reorder_level');
            $table->decimal('current_sale_amount',15,2);
            $table->decimal('current_cost_amount',15,2);
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
        Schema::dropIfExists('stocks');
    }
}
