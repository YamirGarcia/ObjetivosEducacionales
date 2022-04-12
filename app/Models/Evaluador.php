<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluador extends Model
{
    use HasFactory;
    public function departamento(){
        return $this->belongsTo('App\Models\Departamento', 'idDepartamento');
    }

    public function grupoDeInteres(){
        return $this->belongsTo('App\Models\GrupoDeInteres', 'idGrupoDeInteres');
    }

    public function encuestasObjetivos () {
        return $this->hasMany('App\Models\EncuestaEvaluadorObjetivo', 'evaluador');
    }

    public function encuestasAtributos () {
        return $this->hasMany('App\Models\EncuestaEvaluadorAtributo', 'evaluador');
    }
}
