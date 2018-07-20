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
            $table->integer('q1')->default(0);
            $table->date('d1')->nullable();
            $table->integer('q2')->default(0);
            $table->date('d2')->nullable();
            $table->integer('q3')->default(0);
            $table->date('d3')->nullable();
            $table->string('status')->default('solicitado');
            $table->integer('invoice')->nullable();
            $table->date('invoice_date')->nullable();
            $table->string('user_id');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('loans');
    }
}
