<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivoEducacional extends Model
{
    use HasFactory;
    public function carrera(){
        return $this->belongsTo('App\Models\Carrera', 'idCarrera');
    }

    public function numEncuestaObjetivo () {
        return $this->belongsToMany('App\Models\NumeroEncuestaObjetivo', 'encuesta_objetivos');
    }

    public function aspectos () {
        return $this->belongsToMany('App\Models\AspectosObjetivos', 'objetivo_aspectos');
    }
}
