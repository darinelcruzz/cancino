<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabsTable extends Migration
{
    function up()
    {
        Schema::create('tabs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('sc_black');
            $table->string('sc_star');
            $table->string('sc_golden');
            $table->string('ext_black');
            $table->string('ext_star');
            $table->string('ext_golden');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('tabs');
    }
}
