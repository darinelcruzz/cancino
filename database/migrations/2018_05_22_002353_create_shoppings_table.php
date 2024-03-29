<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingsTable extends Migration
{
    function up()
    {
        Schema::create('shoppings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('folio')->nullable();
            $table->date('date')->nullable();
            $table->double('amount')->nullable();
            $table->integer('document')->nullable();
            $table->string('type')->nullable();
            $table->integer('store_id')->nullable();
            $table->string('status')->nullable();
            $table->integer('user_id')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('shoppings');
    }
}
