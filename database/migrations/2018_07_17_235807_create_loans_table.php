<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('from');
            $table->integer('to');
            $table->string('item');
            $table->integer('quantity');
            $table->string('status')->default('solicitado');
            $table->integer('invoice_id')->nullable();
            $table->string('user_id');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('loans');
    }
}
