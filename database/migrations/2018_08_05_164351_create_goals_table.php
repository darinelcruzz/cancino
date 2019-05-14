<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('store_id')->nullable();;
            $table->integer('month');
            $table->integer('year');
            $table->double('sale')->nullable();
            $table->string('point')->nullable();
            $table->integer('days')->nullable();
            $table->double('star')->nullable();
            $table->double('golden')->nullable();
            $table->double('total')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('goals');
    }
}
