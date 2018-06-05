<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('color');
            $table->double('balance')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('stores');
    }
}
