<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Migrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Foreign keys of Users to have Roles
        Schema::table('users',function(Blueprint $table){
            $table->foreign('roles_id')
                ->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('barangays_id')
                ->references('id')->on('barangays')->onDelete('cascade');
        });

        // Farmers
        // Schema::table('rice_farmers',function(Blueprint $table){
        //     $table->foreign('users_id')
        //         ->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('planned_crops_id')
        //         ->references('id')->on('planned_crops')->onDelete('cascade');
        //     $table->foreign('philippine_barangays_id')
        //         ->references('id')->on('philippine_barangays')->onDelete('cascade');
        //     $table->foreign('barangays_id')
        //         ->references('id')->on('barangays')->onDelete('cascade');
        // });

        // Customers
        // Schema::table('customers',function(Blueprint $table){
        //     $table->foreign('customer_types_id')
        //         ->references('id')->on('customer_types')->onDelete('cascade');
        //     $table->foreign('users_id')
        //         ->references('id')->on('users')->onDelete('cascade');
        // });

        // Cart
        //  Schema::table('carts',function(Blueprint $table){
        //     $table->foreign('product_lists_id')
        //         ->references('id')->on('product_lists')->onDelete('cascade');
        //     $table->foreign('customers_id')
        //         ->references('id')->on('customers')->onDelete('cascade');
        // });

        // Product List
        Schema::table('product_lists',function(Blueprint $table){
            $table->foreign('seasons_id')
                ->references('id')->on('seasons')->onDelete('cascade');
            $table->foreign('products_id')
                ->references('id')->on('products')->onDelete('cascade');
            $table->foreign('users_id')
                ->references('id')->on('users')->onDelete('cascade');
        });

        // Season List
        Schema::table('season_lists',function(Blueprint $table){
            $table->foreign('users_id')
                ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('seasons_id')
                ->references('id')->on('seasons')->onDelete('cascade');
        });

        // Seasons
        Schema::table('seasons',function(Blueprint $table){
            $table->foreign('season_types_id')
                ->references('id')->on('season_types')->onDelete('cascade');
            $table->foreign('season_statuses_id')
                ->references('id')->on('season_statuses')->onDelete('cascade');
        });

        // Order Products
        Schema::table('order_products',function(Blueprint $table){
            $table->foreign('product_lists_id')
                ->references('id')->on('product_lists')->onDelete('cascade');
            $table->foreign('orders_id')
                ->references('id')->on('orders')->onDelete('cascade');
        });

        // Orders
        Schema::table('orders',function(Blueprint $table){
            // $table->foreign('order_products_id')
            //     ->references('id')->on('order_products')->onDelete('cascade');
            $table->foreign('users_id')
                ->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('migrations');
    }
}
