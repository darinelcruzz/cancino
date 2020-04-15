<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommisionsTable extends Migration
{
    function up()
    {
        Schema::create('commisions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('employer_id');
            $table->integer('goal_id');
            $table->integer('week');
            $table->double('goal');
            $table->double('sale')->nullable();
            $table->integer('sterencard')->nullable();
            $table->integer('extensions')->nullable();
            $table->integer('amount_ext')->nullable();
            $table->integer('delays')->nullable();
            $table->integer('absences')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('commisions');
    }
}
