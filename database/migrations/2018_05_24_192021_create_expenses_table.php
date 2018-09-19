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

            $table->integer('check')->nullable();
            $table->date('date');
            $table->double('amount');
            $table->string('concept')->nullable();
            $table->string('observations')->nullable();
            $table->integer('store_id');
            $table->integer('type');
            $table->longText('invoices')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('expenses');
    }
}
