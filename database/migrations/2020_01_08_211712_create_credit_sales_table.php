<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditSalesTable extends Migration
{
    function up()
    {
        Schema::create('credit_sales', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->nullable();
            $table->integer('checkup_id');
            $table->integer('folio');
            $table->double('amount');
            $table->string('status')->default('pendiente');
            $table->string('payed_at')->nullable();
            $table->integer('canceled_id')->nullable();
            $table->integer('canceled_folio')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('credit_sales');
    }
}
