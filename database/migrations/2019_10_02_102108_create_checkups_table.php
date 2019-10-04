<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckupsTable extends Migration
{
    public function up()
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('store_id');
            $table->string('cash');
            $table->string('cash_sums');
            $table->string('transfer')->nullable();
            $table->string('transfer_sums')->nullable();
            $table->string('bbva')->nullable();
            $table->string('banamex')->nullable();
            $table->string('card_sums')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('checkups');
    }
}
