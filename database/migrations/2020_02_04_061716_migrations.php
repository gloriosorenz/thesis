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
        Schema::table('rice_farmers',function(Blueprint $table){
            $table->foreign('users_id')
                ->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('planned_crops_id')
            //     ->references('id')->on('planned_crops')->onDelete('cascade');
            // $table->foreign('philippine_barangays_id')
            //     ->references('id')->on('philippine_barangays')->onDelete('cascade');
            // $table->foreign('barangays_id')
            //     ->references('id')->on('barangays')->onDelete('cascade');
        });

        // Customers
        Schema::table('customers',function(Blueprint $table){
            $table->foreign('customer_types_id')
                ->references('id')->on('customer_types')->onDelete('cascade');
            $table->foreign('users_id')
                ->references('id')->on('users')->onDelete('cascade');
        });

        //  // Planned Product List
        //  Schema::table('planned_product_lists',function(Blueprint $table){
        //     $table->foreign('seasons_id')
        //         ->references('id')->on('seasons')->onDelete('cascade');
        //     $table->foreign('rice_farmers_id')
        //         ->references('id')->on('rice_farmers')->onDelete('cascade');
        // });

        // Product List
        Schema::table('product_lists',function(Blueprint $table){
            $table->foreign('seasons_id')
                ->references('id')->on('seasons')->onDelete('cascade');
            $table->foreign('products_id')
                ->references('id')->on('products')->onDelete('cascade');
            $table->foreign('rice_farmers_id')
                ->references('id')->on('rice_farmers')->onDelete('cascade');
        });

       

        // Products
        // Schema::table('products',function(Blueprint $table){
        //     $table->foreign('seasons_id')
        //         ->references('id')->on('seasons')->onDelete('cascade');
        //     $table->foreign('rice_farmers_id')
        //         ->references('id')->on('rice_farmers')->onDelete('cascade');
        // });

        Schema::table('season_lists',function(Blueprint $table){
            $table->foreign('rice_farmers_id')
                ->references('id')->on('rice_farmers')->onDelete('cascade');
            $table->foreign('seasons_id')
                ->references('id')->on('seasons')->onDelete('cascade');
        });

        // Seasons
        Schema::table('seasons',function(Blueprint $table){
            $table->foreign('season_types_id')
                ->references('id')->on('season_types')->onDelete('cascade');
        });

        //  // Planned Crops
        //  Schema::table('planned_crops',function(Blueprint $table){
        //     $table->foreign('seeds_id')
        //         ->references('id')->on('seeds')->onDelete('cascade');
        // });

        //  // Seasons
        //  Schema::table('rice_products',function(Blueprint $table){
        //     $table->foreign('products_id')
        //         ->references('id')->on('products')->onDelete('cascade');
        // });

        // // Seasons
        // Schema::table('withered_products',function(Blueprint $table){
        //     $table->foreign('products_id')
        //         ->references('id')->on('products')->onDelete('cascade');
        // });

        // // Seasons
        // Schema::table('damaged_products',function(Blueprint $table){
        //     $table->foreign('products_id')
        //         ->references('id')->on('products')->onDelete('cascade');
        // });

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
