<?php

namespace App\Http\Livewire\Estadisticas;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;
use App\Models\ObjetivoEducacional;
class EstadisticasComponent extends Component
{
    
    public $datos = null;
    public $carreraSeleccionada = '';
    public $añoSeleccionado = '';
    public $periodoSeleccionado = '';

    public function mount(){
        $user = Auth::user();
        // $carreraSeleccionada = \App\Models\Carrera::select('id','carrera')->where('creadopor',$user->id)->first();
    }

    public function render()
    {
        $user = Auth::user();
        
        $dataBarras = [];
        $nombreCarreras = [];
        $carreras = \App\Models\Carrera::select('id','carrera')->where('creadopor',$user->id)->get();
        $sumatoria = [];
        $contadores = []; 
        $nombresObjetivos = [];
        // if($this->carreraSeleccionada){
        if($this->carreraSeleccionada && $this->añoSeleccionado && $this->periodoSeleccionado){

            $periodo = $this->periodoSeleccionado.$this->añoSeleccionado;
            // dd($periodo);
            $respuestasObjetivo = db::table('objetivo_educacionals')
                                ->join('objetivo_aspectos', 'objetivo_aspectos.objetivo_educacional_id', '=', 'objetivo_educacionals.id')
                                ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'objetivo_aspectos.aspectos_objetivos_id')
                                ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                                ->join('respuesta_objetivos', 'respuesta_objetivos.idPreguntaAspecto', '=', 'pregunta_aspecto_objetivos.id')
                                // ->join('encuesta_objetivos', 'encuesta_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                                ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.id','=', 'respuesta_objetivos.idEncuestaAsignada')
                                ->where([['objetivo_educacionals.idCarrera', '=', $this->carreraSeleccionada], ['encuesta_evaluador_objetivos.periodo', '=', $periodo] ])
                                ->select('objetivo_educacionals.id','objetivo_educacionals.descripcion' ,'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo')->get();
                                
                                // ->where('objetivo_educacionals.idCarrera', $this->carreraSeleccionada == '' ? 2: $this->carreraSeleccionada)
            // $respuestasObjetivo = db::table('encuesta_evaluador_objetivos')
            // ->join('objetivo_aspectos', 'objetivo_aspectos.objetivo_educacional_id', '=', 'objetivo_educacionals.id')
            // ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'objetivo_aspectos.aspectos_objetivos_id')
            // ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
            // ->join('respuesta_objetivos', 'respuesta_objetivos.idPreguntaAspecto', '=', 'pregunta_aspecto_objetivos.id')
            // ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.idCarrera','=', 'objetivo_educacionals.idCarrera')
            // // ->where('objetivo_educacionals.idCarrera', $this->carreraSeleccionada == '' ? 2: $this->carreraSeleccionada)
            // ->where([['objetivo_educacionals.idCarrera', '=', $this->carreraSeleccionada], ['encuesta_evaluador_objetivos.periodo', '=', 'ENE-JUN-2022'] ])
            // ->select('objetivo_educacionals.id','objetivo_educacionals.descripcion' ,'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo')->get();

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
                    // $dataBarras[] = [$sumatoria[$key]];
                }
                
                $this->datos = json_encode($dataBarras);
        }





        return view('livewire.estadisticas.estadisticas-component', [
            'data' => json_encode($dataBarras),
            'carreras' => json_encode($nombreCarreras),
            // 'dataBarras3D' => json_encode($dataBarras3D),
            'carreras2' => $carreras,
            'sumatoria' => json_encode($sumatoria),
            'nombresObjetivos' => json_encode($nombresObjetivos) 
        ])->layout('estadisticas.baseEstadisticas');
    }
}
