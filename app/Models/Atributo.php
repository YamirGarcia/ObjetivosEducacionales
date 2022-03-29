<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    use HasFactory;
    public function carrera(){
        return $this->belongsTo('App\Models\Carrera', 'idCarrera');
    }

    public function numEncuestaAtributo () {
        return $this->belongsToMany('App\Models\NumeroEncuestaAtributo', 'encuesta_atributos');
    }

    public function aspectos () {
        return $this->belongsToMany('App\Models\AspectosAtributos', 'atributo_aspectos');
    }
}
