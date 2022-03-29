<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaAspectoObjetivo extends Model
{
    use HasFactory;
    public function respuestas () {
        return $this->hasMany('App\Models\RespuestaObjetivo');
    }
}
