<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';
    
    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id');
    }
    public function imagen()
    {

       return $this->belongsToMany('App\Imagen','imagen_categorias')->using('App\ImagenCategoria');
    }

   
   
}
