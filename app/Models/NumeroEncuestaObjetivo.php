<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumeroEncuestaObjetivo extends Model
{
    use HasFactory;
    public function carrera () {
        return $this->belongsTo('App\Models\Carrera', 'idCarrera');
    }

    public function objetivos () {
        return $this->belongsToMany('App\Models\ObjetivoEducacional', 'encuesta_objetivos');
    }

    public function encuestasAsignadas(){
        return $this->hasMany('App\Models\EncuestaAsignadaObjetivo', 'idNumeroEncuestaObjetivos');
    }
}
