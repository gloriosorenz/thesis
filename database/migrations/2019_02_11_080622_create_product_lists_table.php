<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seasons_id')->unsigned()->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('orig_products_id')->unsigned()->nullable();
            $table->integer('curr_products_id')->unsigned()->nullable();
            $table->date('harvest_date')->nullable();
            $table->integer('orig_quantity');
            $table->integer('curr_quantity');
            $table->double('price');
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
        Schema::dropIfExists('product_lists');
    }
}
