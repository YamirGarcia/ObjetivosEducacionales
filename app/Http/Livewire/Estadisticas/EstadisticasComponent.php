<?php

namespace App\Http\Livewire\Estadisticas;

use Livewire\Component;

class EstadisticasComponent extends Component
{
    public function render()
    {
        // dd('here');

        $puntos = [];
        $carreras = \App\Models\Carrera::select('id','carrera')->get();
        foreach($carreras as $carrera){
            $puntos[] = ['name' => $carrera['carrera'] , 'y' => $carrera['id']];
        }
        return view('livewire.estadisticas.estadisticas-component', [
            'data' => json_encode($puntos),
        ])->layout('estadisticas.baseEstadisticas');
    }
}
