<?php

namespace App\Http\Livewire\Estadisticas;

use Livewire\Component;

class EstadisticasComponent extends Component
{
    public function render()
    {
        // dd('here');

        $puntos = [];
        $carrerasNombres = array();
        $carreras = \App\Models\Carrera::select('id','carrera')->get();
        foreach($carreras as $carrera){
            $puntos[] = ['name' => $carrera['carrera'], 'carreras'=>$carrera['carrera'] , 'y' => $carrera['id']];
            array_push($carrerasNombres,$carrera['carrera']);
        }
        return view('livewire.estadisticas.estadisticas-component', [
            'data' => json_encode($puntos),
            'nombres' => $carrerasNombres,
        ])->layout('estadisticas.baseEstadisticas');
    }
}
