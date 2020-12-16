<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplyStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('supply_id');
            $table->unsignedInteger('store_id');
            $table->unsignedInteger('quantity')->default(0);
            $table->string('status')->default('activo');
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
        Schema::dropIfExists('supply_stocks');
    }
}
