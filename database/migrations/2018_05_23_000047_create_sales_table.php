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
            $table->double('cash')->nullable();
            $table->double('public')->nullable();
            $table->double('total')->nullable();
            $table->integer('store_id');
            $table->integer('user_id');
            $table->date('date_deposit')->nullable();
            $table->string('status')->default('pendiente');
            $table->string('observations')->nullable();
            $table->integer('checkup_id');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('sales');
    }
}
