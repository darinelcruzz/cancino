<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCheckDataToExpensesTable extends Migration
{
    function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('letter')->nullable();
            $table->string('group')->nullable();
        });
    }

    function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('letter');
            $table->dropColumn('group');
        });
    }
}
