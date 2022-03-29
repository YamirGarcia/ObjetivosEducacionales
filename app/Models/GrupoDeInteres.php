<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoDeInteres extends Model
{
    use HasFactory;
    public function evaluadores(){
        return $this->hasMany('App\Models\Evaluador', 'idGrupoDeInteres');
    }
}
