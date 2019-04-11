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
            $table->integer('calamities_id')->unsigned()->nullable();
            // $table->text('narrative');

            $table->date('occurence_date');
            $table->date('end_date');
            $table->date('report_date');

            $table->string('type');
            $table->integer('num_farmers');
            $table->double('area');

            //month to be harvest should be auto computed, how if diff farmers in barangays have different harvest months
            /*
                Area affected
                    total
                    totally damaged
                    partially damaged
                Yield Per Hectare
                    Before Calamity
                    After Calamity
                Yield Loss
                Total Losses
                    Volume
                    Based on Cost of Input
                        Cost of Import/Hectare
                        Total Value
                Based on Farm Gate Price
                    Volume
                    Price/kg
                    Total Value
            */



            $table->integer('crop_stages_id')->unsigned()->nullable();
            $table->integer('farmers_id')->unsigned()->nullable(); //prepared by
            $table->integer('barangays_id')->unsigned()->nullable();
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
