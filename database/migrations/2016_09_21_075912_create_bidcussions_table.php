<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidcussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidcussions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bidder_id');
            $table->integer('tutor_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->decimal('price', 10, 2);
            $table->text('comment');
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
        Schema::drop('bidcussions');
    }
}
