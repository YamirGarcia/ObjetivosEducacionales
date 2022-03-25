<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspectosObjetivos extends Model
{
    use HasFactory;
    public function objetivos () {
        return $this->belongsToMany('App\Models\ObjetivoEducacional', 'objetivo_aspectos');
    }
}
