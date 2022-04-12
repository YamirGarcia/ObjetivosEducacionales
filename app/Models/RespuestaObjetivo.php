<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaObjetivo extends Model
{
    use HasFactory;

    public function respuesta () {
        return $this->belongsTo('App\Models\EncuestaEvaluadorObjetivo', 'idEncuestaAsignada');
    }

    public function preguntaAspecto () {
        return $this->belongsTo('App\Models\PreguntaAspectoObjetivo', 'idPreguntaAspecto');
    }

    public function encuestaAsignada(){
        return $this->belongsTo('App\Models\EncuestaEvaluadorObjetivo', 'idEncuestaAsignada');
    }
}
