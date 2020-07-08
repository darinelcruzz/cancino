<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplyMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supply_movements', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('supply_id');
            $table->float('price');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('movable_id');
            $table->string('movable_type');

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
        Schema::dropIfExists('supply_movements');
    }
}
