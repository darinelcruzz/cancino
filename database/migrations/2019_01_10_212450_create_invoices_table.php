<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('folio');
            $table->double('amount');
            $table->date('date');
            $table->integer('from');
            $table->integer('to');
            $table->string('status')->default('pendiente');
            $table->integer('pos');
            $table->date('pos_at');
            $table->date('payed_at');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('invoices');
    }
}
