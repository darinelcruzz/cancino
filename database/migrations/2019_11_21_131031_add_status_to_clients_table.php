<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToClientsTable extends Migration
{
    function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('status')->default(1);
        });
    }

    function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
