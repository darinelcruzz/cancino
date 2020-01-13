<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCanceledToCheckupsTable extends Migration
{
    function up()
    {
        Schema::table('checkups', function (Blueprint $table) {
            $table->string('canceled')->nullable();
        });
    }

    function down()
    {
        Schema::table('checkups', function (Blueprint $table) {
            $table->dropColumn('canceled');
        });
    }
}
