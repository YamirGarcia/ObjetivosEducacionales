<?php

namespace App\Http\Livewire\Estadisticas;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class EstadisticasComponent extends Component
{
    public function render()
    {
        // dd('here');

        $puntos = [];
        $nombreCarreras = [];
        $dataBarras3D = [];
        $user = Auth::user();
        $carreras = \App\Models\Carrera::select('id','carrera')->where('creadopor',$user->id)->get();
        foreach($carreras as $carrera){
            $puntos[] = [$carrera['carrera'] , floatval($carrera['id'])];
            $nombreCarreras[] = [$carrera['carrera']];
            $dataBarras3D[] = [$carrera['id']];
        }
        return view('livewire.estadisticas.estadisticas-component', [
            'data' => json_encode($puntos),
            'carreras' => json_encode($nombreCarreras),
            'dataBarras3D' => json_encode($dataBarras3D),
            'carreras2' => $carreras
        ])->layout('estadisticas.baseEstadisticas');
    }
}
