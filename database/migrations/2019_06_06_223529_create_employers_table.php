<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->date('birthday');
            $table->string('address');
            $table->date('ingress');
            $table->integer('store_id');
            $table->string('job');
            $table->integer('status')->default(1);
            $table->string('skills', 1000)->nullable();
            $table->string('weaknesses', 1000)->nullable();
            $table->integer('married');
            $table->integer('sons');
            $table->integer('salary')->nullable();
            $table->integer('ranking')->nullable();

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('employers');
    }
}
