<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres'); 
            $table->string('apellidos'); 
            $table->string('email'); 
            $table->char('sexo',1); 
            $table->char('estado_civil',1); 
            $table->integer('usuario_id');
            $table->integer('edad');
            $table->integer('estado_id')->unsigned();  
            $table->foreign('estado_id')->references('id')->on('estado');  
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
        Schema::dropIfExists('persona');
    }
}
