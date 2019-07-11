<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenancesTable extends Migration
{
    function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('equipment_id');
            $table->string('type')->nullable();
            $table->string('provider')->nullable();
            $table->integer('cost')->nullable();
            $table->date('maintenance_at')->nullable();
            $table->string('observations')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('maintenances');
    }
}
