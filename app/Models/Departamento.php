<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    public function usuarios() {
        return $this->hasMany('App\Models\User', 'idDepartamento');
    }

    public function evaluadores() {
        return $this->hasMany('App\Models\Evaluador', 'idDepartamento');
    }
}
