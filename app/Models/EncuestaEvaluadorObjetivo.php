<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestaEvaluadorObjetivo extends Model
{
    use HasFactory;

    public function aspectosObjetivos () {
        return $this->hasMany('App\Models\EncuestaObjetivo', 'idEncuestaAsignada');
    }

    public function respuestasAspectos () {
        return $this->hasMany('App\Models\RespuestaObjetivo', 'idEncuestaAsignada');
    }

    public function evaluadorAsignado () {
        return $this->belongsTo('App\Models\Evaluador', 'evaluador');
    }

    public function carrera () {
        return $this->belongsTo('App\Models\Carrera', 'idCarrera');
    }
}
