<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('social');
            $table->string('rfc');
            $table->string('business');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('contact')->nullable();
            $table->string('position')->nullable();
            $table->string('cellphone')->nullable();
            $table->integer('store_id');
            $table->integer('user_id');
            $table->integer('type');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('clients');
    }
}
