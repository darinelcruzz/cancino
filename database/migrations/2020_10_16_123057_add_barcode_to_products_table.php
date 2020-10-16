<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBarcodeToProductsTable extends Migration
{
    function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('barcode')->nullable();
        });
    }

    function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('barcode');
        });
    }
}
