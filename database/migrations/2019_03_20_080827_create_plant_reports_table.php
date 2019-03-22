<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active');


            // $table->integer('users_id')->unsigned()->nullable(); //prepared by
            // $table->integer('barangays_id')->unsigned()->nullable();
            // $table->integer('regions_id')->unsigned()->nullable();
            // $table->integer('provinces_id')->unsigned()->nullable();

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
        Schema::dropIfExists('plant_reports');
    }
}
