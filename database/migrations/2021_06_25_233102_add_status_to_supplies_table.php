<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToSuppliesTable extends Migration
{
    function up()
    {
        Schema::table('supplies', function (Blueprint $table) {
            $table->unsignedInteger('status')->default(1);
        });
    }

    function down()
    {
        Schema::table('supplies', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
