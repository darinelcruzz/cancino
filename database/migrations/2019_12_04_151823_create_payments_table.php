<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('debt_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('checkup_id')->nullable();
            $table->integer('amount');
            $table->string('method');
            $table->date('paid_at');            

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('payments');
    }
}
