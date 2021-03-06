<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    public function usuarios(){
        return $this->belongsToMany('App\Models\User', 'usuario_carreras');
    }

    public function objetivos(){
        return $this->hasMany('App\Models\ObjetivoEducacional','idCarrera');
    }

    public function atributos(){
        return $this->hasMany('App\Models\Atributo','idCarrera');
    }

    public function EncuestasAtributos(){
        return $this->hasMany('App\Models\EncuestaEvaluadorAtributo', 'idCarrera');
    }

    public function EncuestasObjetivos(){
        return $this->hasMany('App\Models\EncuestaEvaluadorObjetivo', 'idCarrera');
    }

}
