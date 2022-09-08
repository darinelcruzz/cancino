<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFolioAndInvoicedAtToMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supply_movements', function (Blueprint $table) {
            $table->string('folio')->nullable();
            $table->date('invoiced_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supply_movements', function (Blueprint $table) {
            $table->dropColumn('folio');
            $table->dropColumn('invoiced_at');
        });
    }
}
