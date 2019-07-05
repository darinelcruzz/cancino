<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccountNumberToEmployersTable extends Migration
{
    function up()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->string('account_number')->nullable();
        });
    }

    function down()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn('account_number');
        });
    }
}
