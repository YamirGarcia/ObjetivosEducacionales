<?php

namespace App\Http\Livewire\Evaluadores;

use Livewire\Component;
use App\Models\GrupoDeInteres;
use App\Models\Evaluador;
use Illuminate\Support\Facades\Auth;

class TablaEvaluadoresComponent extends Component
{
    public $search = '';
    public $campo = null;
    public $order = null;
    public $icon = '-circle';

    public function render()
    {
        $grupo = GrupoDeInteres::all();
        $evaluadores = Evaluador::where('nombres','like',"%{$this->search}%")
                    ->orWhere('empresa','like',"%{$this->search}%")
                    ->orWhere('correo','like',"%{$this->search}%")->get();

        return view('livewire.evaluadores.tabla-evaluadores-component',[
            'evaluadores' => $evaluadores,
            'user_sesion' => Auth::user()->name,
            
        ]);
    }
    public function prueba(){
        dd('here');
    }
}
