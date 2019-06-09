<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementsTable extends Migration
{
    function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('id');

            $table->string('employer_id');
            $table->date('date');
            $table->integer('store_id');
            $table->integer('type')->default(1);

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('movements');
    }
}
