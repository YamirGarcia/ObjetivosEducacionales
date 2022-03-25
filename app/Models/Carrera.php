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

    public function numeroEncuestasAtributos(){
        return $this->hasMany('App\Models\NumeroEncuestaAtributo', 'idCarrera');
    }

    public function numeroEncuestasObjetivos(){
        return $this->hasMany('App\Models\NumeroEncuestaObjetivo', 'idCarrera');
    }
}
