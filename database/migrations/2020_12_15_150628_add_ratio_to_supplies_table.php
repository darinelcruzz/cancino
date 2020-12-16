<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRatioToSuppliesTable extends Migration
{
    function up()
    {
        Schema::table('supplies', function (Blueprint $table) {
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('ratio')->default(1);
        });
    }

    function down()
    {
        Schema::table('supplies', function (Blueprint $table) {
            $table->dropColumn('stock');
            $table->dropColumn('ratio');
        });
    }
}
