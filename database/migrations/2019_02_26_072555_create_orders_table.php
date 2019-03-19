<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('tracking_id')->unique();
            $table->integer('order_statuses_id')->unsigned()->nullable();
            $table->double('total_price');

            // $table->integer('order_products_id')->unsigned()->nullable();
            // $table->integer('reserve_products_id')->unsigned()->nullable();
            $table->integer('users_id')->unsigned()->nullable();


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
