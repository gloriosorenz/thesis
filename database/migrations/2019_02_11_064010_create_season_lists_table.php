<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('season_lists', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('users_id')->unsigned()->nullable();
            $table->integer('seasons_id')->unsigned()->nullable();
            $table->double('planned_hectares')->nullable(); //not supposed to be nullable
            $table->double('actual_hectares')->nullable();
            $table->integer('planned_num_farmers')->nullable(); //not supposed to be nullable
            $table->integer('actual_num_farmers')->nullable();
            $table->integer('planned_qty')->nullable(); //not supposed to be nullable
            $table->integer('actual_qty')->nullable();

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
        Schema::dropIfExists('season_lists');
    }
}
