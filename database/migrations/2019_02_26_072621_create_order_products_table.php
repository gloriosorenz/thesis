<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            // $table->integer('total_price');

            $table->integer('order_product_statuses_id')->unsigned()->nullable();
            $table->integer('product_lists_id')->unsigned()->nullable();
            $table->integer('product_types_id')->unsigned()->nullable();
            $table->integer('orders_id')->unsigned()->nullable();
            $table->integer('farmers_id')->unsigned()->nullable();


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
        Schema::dropIfExists('order_products');
    }
}
