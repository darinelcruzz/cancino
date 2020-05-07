<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecksTable extends Migration
{
    function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('folio')->nullable();
            $table->date('emitted_at');
            $table->double('amount');
            $table->string('concept')->nullable();
            $table->text('observations')->nullable();
            $table->unsignedInteger('store_id');
            $table->string('name')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('checks');
    }
}
