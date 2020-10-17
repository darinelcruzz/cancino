<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInventoryIdToCountsTable extends Migration
{
    function up()
    {
        Schema::table('counts', function (Blueprint $table) {
            $table->unsignedInteger('inventory_id');
        });
    }

    function down()
    {
        Schema::table('counts', function (Blueprint $table) {
            $table->dropColumn('inventory_id');
        });
    }
}
