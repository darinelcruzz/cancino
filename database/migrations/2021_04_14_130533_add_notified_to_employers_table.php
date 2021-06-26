<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNotifiedToEmployersTable extends Migration
{
    function up()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->unsignedInteger('notified')->default(0);
        });
    }

    function down()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn('notified');
        });
    }
}
