<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('group');
            $table->string('brand');
            $table->string('type');
            $table->string('category');
            $table->string('description');
            $table->string('size');
            $table->string('package_unit');
            $table->integer('package_quantity');
            $table->string('unit');
            $table->string('photo')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('barcode')->nullable();
            $table->string('rfid')->nullable();
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
        Schema::dropIfExists('products');
    }
}
