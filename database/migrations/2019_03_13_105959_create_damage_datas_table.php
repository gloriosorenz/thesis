<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDamageDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('damage_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('crop')->nullable();
            $table->string('crop_stage')->nullable();
            $table->double('production')->nullable(); //in metric ton

            $table->string('animal')->nullable();
            $table->integer('animal_head')->nullable();

            $table->string('fish')->nullable();
            $table->double('area')->nullable();
            $table->integer('fish_pieces')->nullable();

            $table->integer('damage_reports_id')->unsigned()->nullable();
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
        Schema::dropIfExists('damage_datas');
    }
}
