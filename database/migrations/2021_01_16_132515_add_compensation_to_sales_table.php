<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompensationToSalesTable extends Migration
{
    function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->float('compensation')->default(0);
        });
    }

    function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('compensation');
        });
    }
}
