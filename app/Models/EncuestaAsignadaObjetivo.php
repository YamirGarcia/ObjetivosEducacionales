<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestaAsignadaObjetivo extends Model
{
    use HasFactory;
    public function evaluador () {
        return $this->belongsTo('App\Models\Evaluador', 'idEvaluador');
    }

    public function numeroEncuesta () {
        return $this->belongsTo('App\Models\NumeroEncuestaObjetivo', 'idNumeroEncuestaObjetivos');
    }

    public function respuestasEncuesta () {
        return $this->hasMany('App\Models\RespuestaObjetivo');
    }
}
