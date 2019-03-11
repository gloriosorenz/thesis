<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhAddressTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('regions_id', 10)->index();
        });

        Schema::create('provinces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('regions_id', 10)->index();
            $table->string('provinces_id', 10)->index();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('regions_id', 10)->index();
            $table->string('provinces_id', 10)->index();
            $table->string('cities_id', 10)->index();

            $table->index(['provinces_id', 'regions_id'], 'cities_provinces_regions');
        });

        Schema::create('barangays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('regions_id', 10)->index();
            $table->string('provinces_id', 10)->index();
            $table->string('cities_id', 10)->index();
            
            $table->index(['provinces_id', 'regions_id'], 'barangays_idx_1');
            $table->index(['cities_id', 'provinces_id', 'regions_id'], 'barangays_idx_2');
        });
    }

    public function down()
    {
        Schema::drop('barangays');
        Schema::drop('cities');
        Schema::drop('provinces');
        Schema::drop('regions');
    }
}
