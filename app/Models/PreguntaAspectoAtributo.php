<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaAspectoAtributo extends Model
{
    use HasFactory;
    public function aspecto(){
        return $this->belongsTo('App\Models\AspectosAtributos', 'idAspectoAtributo');
    }
}
