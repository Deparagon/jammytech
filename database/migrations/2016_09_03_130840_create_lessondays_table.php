<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessondaysTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lessondays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_lesson')->unsigned();
            $table->integer('monday')->unsigned()->default(0);
            $table->integer('tuesday')->unsigned()->default(0);
            $table->integer('wednesday')->unsigned()->default(0);
            $table->integer('thursday')->unsigned()->default(0);
            $table->integer('friday')->unsigned()->default(0);
            $table->integer('saturday')->unsigned()->default(0);
            $table->integer('sunday')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('lessondays');
    }
}
