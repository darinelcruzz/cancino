<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');

            $table->date('date_sale');
            $table->double('cash');
            $table->double('total');
            $table->integer('store_id');
            $table->integer('user_id');
            $table->date('date_deposit')->nullable();
            $table->string('status')->default('pendiente');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('sales');
    }
}
