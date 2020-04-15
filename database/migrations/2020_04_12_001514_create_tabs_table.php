<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabsTable extends Migration
{
    function up()
    {
        Schema::create('tabs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('type');
            $table->integer('goal_id');
            $table->integer('balck');
            $table->integer('star');
            $table->integer('golden');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('tabs');
    }
}
