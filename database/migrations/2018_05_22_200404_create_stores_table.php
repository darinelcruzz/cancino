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
            $table->string('type');
            $table->double('star')->nullable();
            $table->double('golden')->nullable();
            $table->string('account')->nullable();
            $table->string('social')->nullable();
            $table->string('rfc')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('stores');
    }
}
