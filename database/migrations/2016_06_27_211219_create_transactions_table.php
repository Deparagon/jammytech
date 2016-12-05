<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->decimal('credit',10,2);
            $table->decimal('debit', 10,2);
            $table->string('transaction_type');
            $table->string('detail');
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('transactions');
    }


    
}
