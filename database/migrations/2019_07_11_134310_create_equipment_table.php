<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentTable extends Migration
{
    function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->integer('store_id');
            $table->string('brand');
            $table->string('type');
            $table->integer('months');
            $table->string('observations')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('equipment');
    }
}
