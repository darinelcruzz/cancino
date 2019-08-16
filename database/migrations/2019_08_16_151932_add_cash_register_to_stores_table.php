<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCashRegisterToStoresTable extends Migration
{
    function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->double('cash')->nullable();
            $table->double('expense')->nullable();
        });
    }

    function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('cash');
            $table->dropColumn('expense');
        });
    }
}
