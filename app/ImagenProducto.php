<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ImagenProducto extends Pivot
{
    protected $table = 'imagen_producto';
    
    public function estado(){
        return $this->belongsTo('App\Estado');
    }

    public function imagen()
    {
        return $this->belongsTo('App\Imagen');
    }
    
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
   
}
