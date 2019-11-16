<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('store_id');
            $table->string('type');
            $table->string('description');
            $table->integer('level');
            $table->date('start_at');
            $table->date('end_at')->nullable();
            $table->string('observations')->nullable();
            $table->string('status')->default('pendiente');
            $table->integer('user_id');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('tasks');
    }
}
