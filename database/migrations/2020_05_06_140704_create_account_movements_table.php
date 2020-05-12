<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_movements', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('bank_account_id');
            $table->string('concept')->nullable();
            $table->string('type')->nullable();
            $table->date('added_at');
            $table->double('amount');
            $table->unsignedInteger('provider_id')->nullable();
            $table->unsignedInteger('check_id')->nullable();
            $table->unsignedInteger('expenses_group_id');

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
        Schema::dropIfExists('account_movements');
    }
}
