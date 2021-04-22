<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTakenProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taken_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('code');
            $table->text('observations');
            $table->date('taken_at');
            $table->unsignedInteger('store_id');
            $table->unsignedInteger('user_id');
            $table->string('pos')->nullable();
            $table->date('deleted_at')->nullable();

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
        Schema::dropIfExists('taken_products');
    }
}
