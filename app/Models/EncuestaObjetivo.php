<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestaObjetivo extends Model
{
    use HasFactory;

    public function encuestaAsignada(){
        return $this->belongsTo('App\Models\EncuestaEvaluadorObjetivo', 'idEncuestaAsignada');
    }
    // $objetivo->encuestaAsignada = {id:12, fk:23}
    public function aspectoObjetivo () {
        return $this->belongsTo('App\Models\AspectosObjetivos', 'idAspectoObjetivo');
    }
}
