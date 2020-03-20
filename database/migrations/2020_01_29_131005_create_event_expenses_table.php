<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventExpensesTable extends Migration
{
    function up()
    {
        Schema::create('event_expenses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('description');
            $table->integer('event_id');
            $table->date('expensed_at');
            $table->string('expender');
            $table->integer('provider_id');
            $table->double('amount');
            $table->string('type');
            $table->string('status');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('event_expenses');
    }
}
