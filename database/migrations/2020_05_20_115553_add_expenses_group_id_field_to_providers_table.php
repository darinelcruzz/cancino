<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpensesGroupIdFieldToProvidersTable extends Migration
{
    function up()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->unsignedInteger('expenses_group_id');
        });
    }

    function down()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->dropColumn('expenses_group_id');
        });
    }
}
