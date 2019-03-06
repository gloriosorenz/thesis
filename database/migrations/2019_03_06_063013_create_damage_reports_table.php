<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDamageReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('calamity');
            $table->text('narrative');

            $table->string('crop')->nullable();
            $table->string('crop_stage')->nullable();
            $table->double('production')->nullable(); //in metric ton

            $table->string('animal')->nullable();
            $table->integer('animal_head')->nullable();

            $table->string('fish')->nullable();
            $table->double('area')->nullable();
            $table->integer('fish_pieces')->nullable();

            // $table->integer('users_id')->unsigned()->nullable(); //prepared by
            $table->integer('regions_id')->unsigned()->nullable();
            $table->integer('provinces_id')->unsigned()->nullable();

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
        Schema::dropIfExists('damage_reports');
    }
}
