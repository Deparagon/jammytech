<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('guarantors')) {
            Schema::create('guarantors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->string('yearsknown');
            $table->string('placeofwork');
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('guarantors');
    }
}
