<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistsTable extends Migration
{
    function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('store_id');
            $table->string('checker');
            $table->integer('q1')->default(0);
            $table->integer('q2')->default(0);
            $table->integer('q3')->default(0);
            $table->integer('q4')->default(0);
            $table->integer('q5')->default(0);
            $table->integer('q6')->default(0);
            $table->integer('q7')->default(0);
            $table->integer('q8')->default(0);
            $table->integer('q9')->default(0);
            $table->integer('q10')->default(0);
            $table->integer('q11')->default(0);
            $table->integer('q12')->default(0);
            $table->integer('q13')->default(0);
            $table->integer('q14')->default(0);
            $table->integer('q15')->default(0);
            $table->integer('q16')->default(0);
            $table->integer('q17')->default(0);
            $table->integer('q18')->default(0);
            $table->integer('q19')->default(0);
            $table->integer('q20')->default(0);
            $table->longText('observations')->nullable();
            $table->date('date');

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('checklists');
    }
}
