<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    public function departamento(){
        return $this->belongsTo('App\Models\Departamento', 'idDepartamento');
    }

    public function carreras(){
        return $this->belongsToMany('App\Models\Carrera', 'usuario_carreras');
    }
}
