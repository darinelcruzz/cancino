<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionToInventoriesTable extends Migration
{
    function up()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->text('description')->nullable();
        });
    }

    function down()
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
