<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspectosObjetivos extends Model
{
    use HasFactory;
    public function objetivo () {
        return $this->belongsToMany('App\Models\ObjetivoEducacional', 'objetivo_aspectos');
    }

    public function preguntas(){
        return $this->hasMany('App\Models\PreguntaAspectoObjetivo', 'idAspectoObjetivo');
    }
}
