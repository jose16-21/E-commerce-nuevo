<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = 'subcategoria';
    protected $fillable = ['id', 'nombre', 'categoria_id', 'estado_id', 'created_at', 'updated_at'];
    
    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id');
    }
   
}
