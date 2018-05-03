<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoTipo extends Model
{
    protected $table = 'estado_tipo';
    protected $fillable = ['tabla_asignada', 'descripcion'];    
    
}
