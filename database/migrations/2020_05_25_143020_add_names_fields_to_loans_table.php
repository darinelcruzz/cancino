<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNamesFieldsToLoansTable extends Migration
{
    function up()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->string('authorized_by')->default('Sergio Cancino');
            $table->string('received_by')->default('Karla González');
        });
    }

    function down()
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn('authorized_by');
            $table->dropColumn('received_by');
        });
    }
}
