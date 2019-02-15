<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiceFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rice_farmers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company')->nullable();
            $table->integer('no_farmers')->nullable();
            $table->double('hectares')->nullable();

            // $table->integer('planned_crops_id')->unsigned()->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            // $table->integer('philippine_barangays_id')->unsigned()->nullable();


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
        Schema::dropIfExists('rice_farmers');
    }
}
