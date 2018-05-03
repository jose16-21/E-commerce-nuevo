<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id');
    }

    public function estadoimg(){
        
                return $this->hasMany('App\estado');
            }
            
    public function subcategoria(){

        return $this->belongsTo(SubCategoria::class,'subcategoria_id');
    }

    public function imagen()
    {
        return $this->belongsToMany('App\Imagen','imagen_producto')->using('App\ImagenProducto');

    }

    public function getOferta()
    {
        if ($this->oferta==1) {
            return "Si";
        } else {
            return "No";
        }
    }
}
