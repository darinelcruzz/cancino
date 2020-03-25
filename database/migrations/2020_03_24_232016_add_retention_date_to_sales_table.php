<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRetentionDateToSalesTable extends Migration
{
    function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->double('retention')->default(0);
            $table->date('ret_date')->nullable();
        });
    }

    function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('ret_date');
            $table->dropColumn('ret_date');
        });
    }
}
