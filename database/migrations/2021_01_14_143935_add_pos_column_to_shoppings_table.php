<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPosColumnToShoppingsTable extends Migration
{
    function up()
    {
        Schema::table('shoppings', function (Blueprint $table) {
            $table->string('pos')->nullable();
        });
    }

    function down()
    {
        Schema::table('shoppings', function (Blueprint $table) {
            $table->dropColumn('pos');
        });
    }
}
