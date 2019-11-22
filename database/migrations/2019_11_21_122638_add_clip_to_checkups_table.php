<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClipToCheckupsTable extends Migration
{
    function up()
    {
        Schema::table('checkups', function (Blueprint $table) {
            $table->string('clip')->nullable();
            $table->string('credit')->nullable();
        });
    }

    function down()
    {
        Schema::table('checkups', function (Blueprint $table) {
            $table->dropColumn('clip');
            $table->dropColumn('credit');
        });
    }
}
