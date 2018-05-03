<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('categoria_id')->unsigned();
            $table->integer('estado_id')->unsigned();  
            $table->foreign('estado_id')->references('id')->on('estado');  
            $table->foreign('categoria_id')->references('id')->on('categoria');  
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
        Schema::dropIfExists('subcategoria');
    }
}
