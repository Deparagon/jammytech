<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->integer('id_tutor')->unsigned()->nullable();
            $table->integer('id_student')->unsigned();
            $table->integer('id_course')->unsigned();
            $table->string('lessonstreet')->nullable();
            $table->string('lessoncity');
            $table->string('lessonstate');
            $table->string('lessonstartin');
            $table->string('lessonstudentcount');
            $table->string('lessonlocation');
            $table->string('lessonphone');
            $table->string('lessonemail');
            $table->string('duration');
            $table->string('hoursperday');
            $table->string('lessonstarttime');
            $table->string('studentlevel');
            $table->string('lessongoal');
            $table->decimal('budget', 10, 2);
            $table->decimal('amount', 10, 2)->default(0);
            $table->string('tutorgender');
            $table->string('paymentstatus')->default('Unpaid');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->tinyInteger('studentcomplete')->default(0);
            $table->tinyInteger('studentreject')->default(0);
            $table->tinyInteger('tutorcomplete')->default(0);
            $table->string('status')->nullable();
            $table->tinyInteger('studentrate')->default(0);
            $table->tinyInteger('tutorrate')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('lessons');
    }
}
