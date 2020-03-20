<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('social');
            $table->string('business');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('contact')->nullable();
            $table->string('cellphone')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('providers');
    }
}
