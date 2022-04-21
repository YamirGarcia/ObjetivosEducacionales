<?php

namespace App\Http\Livewire\Elementos;

use Livewire\Component;
use App\Models\GrupoDeInteres;

class AgregarGrupoInteresComponent extends Component
{
    public $grupos;
    public $descripcion;

    public function render()
    {
        $this->grupos = GrupoDeInteres::select('nombre','id')->get();
        return view('livewire.elementos.agregar-grupo-interes-component',[
            'grupos' => $this->grupos,
        ]);
    }

    public function guardar(){

    }
}
