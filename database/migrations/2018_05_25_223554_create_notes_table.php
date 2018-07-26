<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{

    function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('store_id');
            $table->integer('folio');
            $table->double('amount');
            $table->date('date_nc');
            $table->string('items', 600);
            $table->string('observations')->nullable();
            $table->integer('document')->nullable();
            $table->date('date_pos')->nullable();
            $table->string('status')->default('pendiente');
            $table->integer('user_id');

            $table->timestamps();
        });
    }

     function down()
    {
        Schema::dropIfExists('notes');
    }
}
