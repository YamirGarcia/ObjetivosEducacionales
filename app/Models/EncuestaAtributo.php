<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestaAtributo extends Model
{
    use HasFactory;
    public function encuestaAsignada(){
        return $this->belongsTo('App\Models\EncuestaEvaluadorAtributo', 'idEncuestaAsignada');
    }

    public function aspectoAtributo () {
        return $this->belongsTo('App\Models\AspectosAtributos', 'idAspectoAtributo');
    }
}
