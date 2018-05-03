<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('precio');
            $table->string('slug')->unique();
            $table->integer('subcategoria_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->integer('estado_id')->unsigned(); 
            $table->integer("oferta")->nullable();
            $table->foreign('estado_id')->references('id')->on('estado');  
            $table->foreign('usuario_id')->references('id')->on('usuario');  
            $table->foreign('subcategoria_id')->references('id')->on('subcategoria');  
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
        Schema::dropIfExists('producto');
    }
}
