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

            $table->timestamp('date');
            $table->integer('client_id');
            $table->string('observations', 900)->nullable();
            $table->string('notes', 900)->nullable();
            $table->string('reason');
            $table->string('document')->nullable();
            $table->double('amount')->nullable();
            $table->string('status');
            $table->integer('user_id');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('binnacles');
    }
}
