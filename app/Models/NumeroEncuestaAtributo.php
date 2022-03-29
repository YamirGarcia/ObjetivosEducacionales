<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumeroEncuestaAtributo extends Model
{
    use HasFactory;
    public function carrera () {
        return $this->belongsTo('App\Models\Carrera', 'idCarrera');
    }

    public function atributos () {
        return $this->belongsToMany('App\Models\Atributo', 'encuesta_atributos');
    }

    public function encuestasAsignadas(){
        return $this->hasMany('App\Models\EncuestaAsignadaAtributo', 'idNumeroEncuestaAtributos');
    }
}
