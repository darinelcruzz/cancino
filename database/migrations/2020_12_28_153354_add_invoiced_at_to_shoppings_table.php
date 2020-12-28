<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvoicedAtToShoppingsTable extends Migration
{
    function up()
    {
        Schema::table('shoppings', function (Blueprint $table) {
            $table->date('invoiced_at')->nullable();
        });
    }

    function down()
    {
        Schema::table('shoppings', function (Blueprint $table) {
            $table->dropColumn('invoiced_at');
        });
    }
}
