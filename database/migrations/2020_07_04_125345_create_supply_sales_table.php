<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplySalesTable extends Migration
{
    function up()
    {
        Schema::create('supply_sales', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('store_id');
            $table->unsignedInteger('user_id');
            $table->float('amount');
            $table->date('sold_at');
            $table->string('status')->default('pendiente');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('supply_sales');
    }
}
