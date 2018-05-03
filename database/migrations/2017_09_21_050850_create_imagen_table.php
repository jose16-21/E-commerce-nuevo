<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre'); 
            $table->string('descripcion');
            $table->bigInteger('size');
            $table->char('tipo',10);
            $table->integer('usuario_id')->unsigned();
            $table->integer('estado_id')->unsigned();
            $table->integer('portada')->nullable();;
            //$table->integer('producto_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuario');  
            $table->foreign('estado_id')->references('id')->on('estado');  
            //$table->foreign('producto_id')->references('id')->on('producto');  
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
        Schema::dropIfExists('imagen');
    }
}
