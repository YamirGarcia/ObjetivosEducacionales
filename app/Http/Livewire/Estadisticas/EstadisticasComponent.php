<?php

namespace App\Http\Livewire\Estadisticas;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;
use App\Models\ObjetivoEducacional;
class EstadisticasComponent extends Component
{
    
    public $carreraSeleccionada = '';

    public function mount(){
        $user = Auth::user();
        $this->carreraSeleccionada = Carrera::where('creadopor', $user->id)->first()->id;
        // $this->carreraSeleccionada = '4';

    }

    public function render()
    {
        // dd('here');
        $user = Auth::user();
        
        $dataBarras = [];
        $nombreCarreras = [];
        $dataBarras3D = [];
        $carreras = \App\Models\Carrera::select('id','carrera')->where('creadopor',$user->id)->get();
        $sumatoria = [];
        $contadores = []; 
        $nombresObjetivos = [];
        $respuestasObjetivo = db::table('objetivo_educacionals')
                            ->join('objetivo_aspectos', 'objetivo_aspectos.objetivo_educacional_id', '=', 'objetivo_educacionals.id')
                            ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'objetivo_aspectos.aspectos_objetivos_id')
                            ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                            ->join('respuesta_objetivos', 'respuesta_objetivos.idPreguntaAspecto', '=', 'pregunta_aspecto_objetivos.id')
                            ->where('objetivo_educacionals.idCarrera', $this->carreraSeleccionada)
                            ->select('objetivo_educacionals.id','objetivo_educacionals.descripcion' ,'respuesta_objetivos.respuesta')->get();

        


        foreach($respuestasObjetivo as $item){
            
            if(isset($sumatoria[$item->id])){
                $sumatoria[$item->id] += intval($item->respuesta);
                $contadores[$item->id] += 1;
            } else{
                $sumatoria[$item->id] = intval($item->respuesta);
                $contadores[$item->id] = 1;
                $nombresObjetivos[] = $item->descripcion;
            }
        }


        foreach ($sumatoria as $key => &$val) {
            $sumatoria[$key] = $sumatoria[$key] / $contadores[$key];
        }

        foreach ($sumatoria as $key => &$val) {
            $dataBarras[] = [ObjetivoEducacional::find($key)->descripcion, $sumatoria[$key]];
        }
        
        

        return view('livewire.estadisticas.estadisticas-component', [
            'data' => json_encode($dataBarras),
            'carreras' => json_encode($nombreCarreras),
            'dataBarras3D' => json_encode($dataBarras3D),
            'carreras2' => $carreras,
            'sumatoria' => json_encode($sumatoria),
            'nombresObjetivos' => json_encode($nombresObjetivos) 
        ])->layout('estadisticas.baseEstadisticas');
    }
}
