<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('imagen_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('imagen_id')->references('id')->on('imagen');
            $table->foreign('producto_id')->references('id')->on('producto');
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
        Schema::dropIfExists('imagen_producto');
    }
}
