<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            //
            Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('video')->nullable();
            $table->string('gender')->nullable();
            $table->string('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('bio')->nullable();
            $table->string('alatitude')->nullable();
            $table->string('alongitude')->nullable();
            $table->tinyInteger('power')->unsigned()->default(0);
            $table->tinyInteger('tutor')->unsigned()->default(0);
            $table->tinyInteger('student')->unsigned()->default(1);
            $table->tinyInteger('status')->unsigned()->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
