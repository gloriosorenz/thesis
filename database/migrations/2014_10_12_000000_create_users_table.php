<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable(); //not nullable
            $table->string('last_name')->nullable(); //not nullable
            $table->string('phone')->nullable(); //not nullable
            $table->string('barangay')->nullable(); //not nullable
            $table->string('province')->nullable(); //not nullable
            $table->string('city')->nullable(); //not nullable
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); 
            $table->boolean('active')->nullable();
            $table->rememberToken();

            $table->string('company')->nullable();
            $table->integer('no_farmers')->nullable();
            $table->double('hectares')->nullable();

            $table->integer('roles_id')->unsigned()->nullable();
            $table->integer('barangays_id')->unsigned()->nullable();

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
        Schema::dropIfExists('users');
    }
}
