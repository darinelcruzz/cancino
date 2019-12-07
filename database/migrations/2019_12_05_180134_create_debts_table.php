<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebtsTable extends Migration
{
    function up()
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('store_id');
            $table->integer('employer_id');
            $table->string('description');
            $table->integer('amount');
            $table->integer('payments');
            $table->date('requested_at');
            $table->string('status');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('debts');
    }
}
