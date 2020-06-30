<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsitesTable extends Migration
{
    function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name');
            $table->text('url');
            $table->string('username');
            $table->string('password');
            $table->unsignedInteger('store_id');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('websites');
    }
}
