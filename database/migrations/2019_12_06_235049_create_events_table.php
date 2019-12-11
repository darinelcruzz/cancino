<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->date('date');
            $table->string('name');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('events');
    }
}
