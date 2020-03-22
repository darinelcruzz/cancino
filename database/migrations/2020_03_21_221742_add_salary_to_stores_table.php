<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSalaryToStoresTable extends Migration
{
    function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->integer('salary')->nullable();
            $table->integer('account_tpv')->nullable();
        });
    }

    function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('salary');
            $table->dropColumn('account_tpv');
        });
    }
}
