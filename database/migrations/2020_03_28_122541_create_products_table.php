<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('code');
            $table->text('description');
            $table->string('status')->nullable();
            $table->string('family')->nullable();
            $table->float('price')->default(0);
            $table->integer('quantity')->default(0);

            $table->timestamps();
        });
    }

    function down()
    {
        Schema::dropIfExists('products');
    }
}
