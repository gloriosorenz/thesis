<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlannedCropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('planned_crops', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('quantity')->nullable();
        //     $table->boolean('active')->nullable();

        //     $table->integer('rice_farmers_id')->unsigned()->nullable();
        //     $table->integer('seeds_id')->unsigned()->nullable();
            
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planned_crops');
    }
}
