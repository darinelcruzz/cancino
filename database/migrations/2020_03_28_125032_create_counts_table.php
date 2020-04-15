<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountsTable extends Migration
{
    function up()
    {
        Schema::create('counts', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('helper_id');
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('product_id');
            $table->integer('quantity');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('counts');
    }
}
