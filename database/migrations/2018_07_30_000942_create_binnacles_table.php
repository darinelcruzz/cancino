<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinnaclesTable extends Migration
{
    function up()
    {
        Schema::create('binnacles', function (Blueprint $table) {
            $table->increments('id');

            $table->date('date');
            $table->integer('client_id');
            $table->long('observations');
            $table->string('reason');
            $table->string('document');
            $table->double('amount');
            $table->integer('user_id');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('binnacles');
    }
}
