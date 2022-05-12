<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAxtColumnsToTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabs', function (Blueprint $table) {
            $table->string('axt_black_pro')->nullable();
            $table->string('axt_star_pro')->nullable();
            $table->string('axt_golden_pro')->nullable();
            $table->string('axt_black_shop')->nullable();
            $table->string('axt_star_shop')->nullable();
            $table->string('axt_golden_shop')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tabs', function (Blueprint $table) {
            $table->dropColumn('axt_black_pro');
            $table->dropColumn('axt_star_pro');
            $table->dropColumn('axt_golden_pro');
            $table->dropColumn('axt_black_shop');
            $table->dropColumn('axt_star_shop');
            $table->dropColumn('axt_golden_shop');
        });
    }
}
