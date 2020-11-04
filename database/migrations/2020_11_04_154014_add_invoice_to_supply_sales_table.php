<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvoiceToSupplySalesTable extends Migration
{
    function up()
    {
        Schema::table('supply_sales', function (Blueprint $table) {
            $table->string('invoice')->nullable();
        });
    }

    function down()
    {
        Schema::table('supply_sales', function (Blueprint $table) {
            $table->dropColumn('invoice');
        });
    }
}
