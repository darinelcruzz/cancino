<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplyPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_purchases', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('provider_id');
            $table->unsignedInteger('user_id');
            $table->float('amount');
            $table->date('purchased_at');
            $table->string('status')->default('pendiente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supply_purchases');
    }
}
