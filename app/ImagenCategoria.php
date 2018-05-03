<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ImagenCategoria extends Pivot
{
    protected $table = 'imagen_categorias';

    public function estado(){
        return $this->belongsTo('App\Estado');
    }

    public function imagen()
    {
        return $this->belongsTo('App\Imagen');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
