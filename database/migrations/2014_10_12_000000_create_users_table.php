<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('level');
            $table->integer('store_id');
            $table->integer('location_id')->nullable();


            $table->rememberToken();
            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('users');
    }
}
