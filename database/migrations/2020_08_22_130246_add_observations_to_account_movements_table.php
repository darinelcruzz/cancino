<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddObservationsToAccountMovementsTable extends Migration
{
    function up()
    {
        Schema::table('account_movements', function (Blueprint $table) {
            $table->text('observations')->nullable();
        });
    }

    function down()
    {
        Schema::table('account_movements', function (Blueprint $table) {
            $table->dropColumn('observations');
        });
    }
}
