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
            $table->string('region_id', 10)->index();
        });

        Schema::create('provinces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('region_id', 10)->index();
            $table->string('province_id', 10)->index();
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->string('region_id', 10)->index();
            $table->string('province_id', 10)->index();
            $table->string('city_id', 10)->index();

            $table->index(['province_id', 'region_id'], 'cities_province_regions');
        });

        Schema::create('barangays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('region_id', 10)->index()->nullable();
            $table->string('province_id', 10)->index()->nullable();
            $table->string('city_id', 10)->index()->nullable();
            $table->timestamps();

            $table->index(['province_id', 'region_id'], 'barangay_idx_1')->nullable();
            $table->index(['city_id', 'province_id', 'region_id'], 'barangay_idx_2')->nullable();
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
