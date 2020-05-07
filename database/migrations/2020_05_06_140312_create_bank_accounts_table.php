<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('store_id');
            $table->string('number');
            $table->string('type');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
}
