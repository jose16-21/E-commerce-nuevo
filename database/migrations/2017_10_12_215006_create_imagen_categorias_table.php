<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->unsigned();
            $table->integer('imagen_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categoria');
            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('imagen_id')->references('id')->on('imagen');
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
        Schema::dropIfExists('imagen_categorias');
    }
}
