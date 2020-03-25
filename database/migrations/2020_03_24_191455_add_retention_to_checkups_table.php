<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRetentionToCheckupsTable extends Migration
{
    function up()
    {
        Schema::table('checkups', function (Blueprint $table) {
            $table->double('sc_dif')->default(0);
            $table->double('retention')->default(0);
        });
    }

    function down()
    {
        Schema::table('checkups', function (Blueprint $table) {
            $table->dropColumn('sc_dif');
            $table->dropColumn('retention');
        });
    }
}
