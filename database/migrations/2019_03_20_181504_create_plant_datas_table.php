<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->double('plant_area');
            $table->integer('farmers');

            $table->integer('plant_reports_id')->unsigned()->nullable();
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
        Schema::dropIfExists('plant_datas');
    }
}
