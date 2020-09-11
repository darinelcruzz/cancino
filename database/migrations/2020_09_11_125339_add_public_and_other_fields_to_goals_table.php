<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublicAndOtherFieldsToGoalsTable extends Migration
{
    public function up()
    {
        Schema::table('goals', function (Blueprint $table) {
            $table->float('public')->default(0);
            $table->float('special')->default(0);
            $table->float('distributor')->default(0);
            $table->float('wholesale')->default(0);
            $table->float('other')->default(0);
            $table->float('sellers')->default(0);
            $table->float('discounts')->default(0);
            $table->float('steren_card')->default(0);
            $table->float('stock')->default(0);
        });
    }

    public function down()
    {
        Schema::table('goals', function (Blueprint $table) {
            $table->dropColumn('public');
            $table->dropColumn('special');
            $table->dropColumn('distributor');
            $table->dropColumn('wholesale');
            $table->dropColumn('other');
            $table->dropColumn('sellers');
            $table->dropColumn('discounts');
            $table->dropColumn('steren_card');
            $table->dropColumn('stock');
        });
    }
}
