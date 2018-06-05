<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('check');
            $table->date('date');
            $table->double('amount');
            $table->string('concept');
            $table->string('description')->nullable();
            $table->integer('store_id');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('expenses');
    }
}
