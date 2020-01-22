<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCostToEquipmentTable extends Migration
{
    function up()
    {
        Schema::table('equipment', function (Blueprint $table) {
            $table->integer('cost')->nullable();
            $table->date('bought_at')->nullable();
        });
    }

    function down()
    {
        Schema::table('equipment', function (Blueprint $table) {
            $table->dropColumn('cost');
            $table->dropColumn('bought_at');
        });
    }
}
