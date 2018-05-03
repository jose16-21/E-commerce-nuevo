<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';

     /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->nombres . ' ' . $this->apellidos;
    }
    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id');
    }
    /**
     * Get the estado civil
     *
     * @return string
     */
    public function getGenero()
    {
        if ($this->estado_civil=="S") {
            return "Soltero";
        } else {
            return "Casado";
        }
    }

    /**
     * Get the sexo
     *
     * @return string
     */
    public function getSexo()
    {
        if ($this->sexo=="M") {
            return "Masculino";
        } else {
            return "Femenino";
        }
    }
    
}
