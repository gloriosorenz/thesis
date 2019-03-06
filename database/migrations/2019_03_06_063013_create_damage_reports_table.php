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

            $table->string('crop');
            $table->string('crop_stage');
            $table->double('production'); //in metric ton

            $table->string('animal');
            $table->integer('animal_head');

            $table->string('fish');
            $table->double('area');
            $table->integer('fish_pieces');

            $table->integer('users_id')->unsigned()->nullable(); //prepared by
            $table->integer('barangays_id')->unsigned()->nullable();
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
