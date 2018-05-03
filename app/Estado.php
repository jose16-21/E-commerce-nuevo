<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';
    
    public function imagen()
    {
        return $this->belongsTo('App\Estado');
    }

    public function producto()
    {
        return $this->hasMany('App\Producto');
    }

}
