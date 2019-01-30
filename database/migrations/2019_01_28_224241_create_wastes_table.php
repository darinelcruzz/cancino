<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWastesTable extends Migration
{
    function up()
    {
        Schema::create('wastes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('item');
            $table->string('description');
            $table->integer('store_id');
            $table->string('status')->default('pendiente');
            $table->integer('pos')->nullable();
            $table->date('pos_at')->nullable();
            $table->integer('user_id');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('wastes');
    }
}
