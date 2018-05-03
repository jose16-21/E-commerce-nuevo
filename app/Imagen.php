<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagen';
    
    public function estado(){

        return $this->belongsTo('App\Estado');
    }
    
    public function producto()
    {
        return $this->belongsToMany('App\Producto','imagen_producto')->using('App\ImagenProducto');
    }

    public function categoria()
    {
       return $this->belongsToMany('App\Categoria','imagen_categorias')->using('App\ImagenCategoria');

    }

    public function estadoimg(){

        return $this->hasMany('App\Estado');
    }
   
}
