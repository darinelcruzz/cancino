<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptsTable extends Migration
{
    function up()
    {
        Schema::create('concepts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('description');
            $table->unsignedInteger('provider_id');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('concepts');
    }
}
