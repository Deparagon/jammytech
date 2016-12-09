<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcanteachsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('icanteachs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('course_id');
            $table->decimal('price', 10, 2);
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('icanteachs');
    }
}
