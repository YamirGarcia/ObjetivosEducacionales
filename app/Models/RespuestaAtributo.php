<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaAtributo extends Model
{
    use HasFactory;

    public function respuesta () {
        return $this->belongsTo('App\Models\EncuestaEvaluadorAtributo', 'idEncuestaAsignada');
    }

    public function preguntaAspecto () {
        return $this->belongsTo('App\Models\PreguntaAspectoAtributo', 'idPreguntaAspecto');
    }

    public function encuestaAsignada(){
        return $this->belongsTo('App\Models\EncuestaEvaluadorAtributo', 'idEncuestaAsignada');
    }
}
