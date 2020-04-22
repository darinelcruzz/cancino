<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTabIdToCommisionsTable extends Migration
{
    function up()
    {
        Schema::table('commisions', function (Blueprint $table) {
            $table->integer('tab_id')->nullable();
        });
    }

    function down()
    {
        Schema::table('commisions', function (Blueprint $table) {
            $table->dropColumn('tab_id');
        });
    }
}
