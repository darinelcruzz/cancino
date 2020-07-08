<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesTable extends Migration
{
    function up()
    {
        Schema::create('supplies', function (Blueprint $table) {
            $table->increments('id');
            
            $table->text('description');
            $table->text('code');
            $table->text('sat_key');
            $table->unsignedInteger('quantity')->default(1);
            $table->text('unit');
            $table->float('purchase_price')->default(0);
            $table->float('sale_price')->default(0);

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('supplies');
    }
}
