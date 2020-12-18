<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAmountToSupplyTransfersTable extends Migration
{
    function up()
    {
        Schema::table('supply_transfers', function (Blueprint $table) {
            $table->float('amount')->default(0);
        });
    }

    function down()
    {
        Schema::table('supply_transfers', function (Blueprint $table) {
            $table->dropColumn('amount');
        });
    }
}
