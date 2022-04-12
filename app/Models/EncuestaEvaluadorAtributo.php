<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestaEvaluadorAtributo extends Model
{
    use HasFactory;
    public function aspectosAtributos () {
        return $this->hasMany('App\Models\EncuestaAtributo', 'idEncuestaAsignada');
    }

    public function respuestasAspectos () {
        return $this->hasMany('App\Models\RespuestaAtributo', 'idEncuestaAsignada');
    }
}
