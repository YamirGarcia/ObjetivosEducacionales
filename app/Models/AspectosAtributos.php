<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspectosAtributos extends Model
{
    use HasFactory;
    public function atributo () {
        return $this->belongsToMany('App\Models\Atributo', 'atributo_aspectos');
    }

    public function preguntas () {
        return $this->hasMany('App\Models\PreguntaAspectoAtributo', 'idAspectoAtributo');
    }
}
