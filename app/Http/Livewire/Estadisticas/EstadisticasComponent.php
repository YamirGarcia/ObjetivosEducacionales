<?php

namespace App\Http\Livewire\Estadisticas;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;
use App\Models\ObjetivoEducacional;
use App\Models\AspectosObjetivos;

use function PHPSTORM_META\type;

class EstadisticasComponent extends Component
{
    
    public $datos = null;
    public $datos2 = null;
    public $dataAspectos = null;
    public $carreraSeleccionada = '';
    public $añoSeleccionado = '';
    public $periodoSeleccionado = '';
    public $respuestaAtributoArray = null;
    public $sumatoriaAspectosArray = null;
    public $valoresAspectos = null;

    public $sumatoriaPublic = null;
    public $sumatoriaAspectosPublic = null;

    public function mount(){
        $user = Auth::user();
        // $carreraSeleccionada = \App\Models\Carrera::select('id','carrera')->where('creadopor',$user->id)->first();
    }

    public function render()
    {
        $user = Auth::user();
        
        $dataBarras = [];
        $dataAspectos = [];
        $nombreCarreras = [];
        $carreras = \App\Models\Carrera::select('id','carrera')->where('creadopor',$user->id)->get();
        $sumatoria = [];
        $sumatoriaAspectos = [];
        $contadores = []; 
        $contadoresAspectos = [];
        $nombresObjetivos = [];
        $nombresAspectos = [];
        // variables de prueba
        $idObjetivos = [];

        if($this->carreraSeleccionada && $this->añoSeleccionado && $this->periodoSeleccionado){

            $periodo = $this->periodoSeleccionado.$this->añoSeleccionado;
            // dd($periodo);
            $respuestasTemp = db::table('objetivo_educacionals')
                                ->join('objetivo_aspectos', 'objetivo_aspectos.objetivo_educacional_id', '=', 'objetivo_educacionals.id')
                                ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'objetivo_aspectos.aspectos_objetivos_id')
                                ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                                ->join('respuesta_objetivos', 'respuesta_objetivos.idPreguntaAspecto', '=', 'pregunta_aspecto_objetivos.id')
                                // ->join('encuesta_objetivos', 'encuesta_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                                ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.id','=', 'respuesta_objetivos.idEncuestaAsignada')
                                ->where([['objetivo_educacionals.idCarrera', '=', $this->carreraSeleccionada], ['encuesta_evaluador_objetivos.periodo', '=', $periodo] ]);
                                
            $respuestasTemp2 = db::table('respuesta_objetivos')
                            ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.id' , '=' , 'respuesta_objetivos.idPreguntaAspecto')
                            ->join('aspectos_objetivos', 'aspectos_objetivos.id' , '=' , 'pregunta_aspecto_objetivos.idAspectoObjetivo')
                            ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.id', '=', 'respuesta_objetivos.idEncuestaAsignada')
                            ->where([['encuesta_evaluador_objetivos.idCarrera', '=', $this->carreraSeleccionada], ['encuesta_evaluador_objetivos.periodo', '=', $periodo] ]);               

            $respuestasObjetivo = $respuestasTemp->select('objetivo_educacionals.id','objetivo_educacionals.descripcion' ,'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo')->get();
            $respuestasAtributos = $respuestasTemp->select('aspectos_objetivos.id','aspectos_objetivos.nombre' ,'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo', 'objetivo_educacionals.id as objetivo')->get();
            $this->respuestaAtributoArray = $respuestasAtributos;
            // ------------------------------ SUMATORIAS ------------------------------
            // dd($respuestasAtributos);
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

            foreach($respuestasAtributos as $item){
                
                if(isset($sumatoriaAspectos[$item->id])){
                    $sumatoriaAspectos[$item->id] += intval($item->respuesta);
                    // $valoresAspectos[$item->objetivo] += intval($item->respuesta);
                    $contadoresAspectos[$item->id] += 1;
                } else{
                    $sumatoriaAspectos[$item->id] = intval($item->respuesta);
                    $this->valoresAspectos[$item->id] = $item->objetivo;
                    $contadoresAspectos[$item->id] = 1;
                    $nombresAspectos[$item->id] = $item->nombre;
                }
            }

            // dd($sumatoria);

            // dd(gettype($sumatoriaAspectos));

            // -------------------------------- PROMEDIOS ----------------------------------------------

            foreach ($sumatoria as $key => &$val) {
                $sumatoria[$key] = $sumatoria[$key] / $contadores[$key];
            }
            foreach ($sumatoriaAspectos as $key => &$val) {
                $sumatoriaAspectos[$key] = $sumatoriaAspectos[$key] / $contadoresAspectos[$key];
                // $valoresAspectos[$key] = $valoresAspectos[$key] / $contadoresAspectos[$key];
            }
            
            $this->sumatoriaPublic = $sumatoria;
            $this->sumatoriaAspectosPublic = $sumatoriaAspectos;
            // dd($sumatoria);

            // --------------------------------  ----------------------------------------------
            // $this->sumatoriaAspectosArray = $valoresAspectos;
            // dd($valoresAspectos);
            foreach ($sumatoria as $key => &$val) {
                // $drilldown = ;
                // $dataBarras[] = [ObjetivoEducacional::find($key)->descripcion, $sumatoria[$key]];
                // $dataBarras[] = [$sumatoria[$key]];
                // dd($sumatoriaAspectos);
                $dataBarras[] = ["name" => ObjetivoEducacional::find($key)->descripcion, "y"=> $sumatoria[$key], "drilldown" => 'objetivo' . $key];
                $dataAspectos[] = $this->arregloAspectos($key);
                // foreach ($sumatoriaAspectos as $keyAspectos => &$valAspectos){
                    // $this->arregloAspectos($keyAspectos);
                    // $dataAspectos[] = ["name" => AspectosObjetivos::find($keyAspectos)->nombre, "id" => 'objetivo' . $key, "data" => $this->arregloAspectos($valAspectos) ];
                // }
                // dd($sumatoriaAspectos);
            }
            // dd($sumatoriaAspectos);
            foreach ($sumatoria as $key => &$val) {
                $dataBarras[] = ["name" => ObjetivoEducacional::find($key)->descripcion, "y"=> $sumatoria[$key], "drilldown" => 'objetivo' . $key];
            }


            $this->datos =  json_encode($dataBarras);
            $this->datos2 = $dataBarras;
            $this->dataAspectos = $dataAspectos;
            dd($dataAspectos);

            // dd($dataAspe);
        }



        // ["name" => ObjetivoEducacional::find($key)->descripcion, "id" => 'objetivo' . $key, "data" => $this->function($objetivo)];


        return view('livewire.estadisticas.estadisticas-component', [
            'data' => json_encode($dataBarras),
            'carreras' => json_encode($nombreCarreras),
            // 'dataBarras3D' => json_encode($dataBarras3D),
            'carreras2' => $carreras,
            'sumatoria' => json_encode($sumatoria),
            'nombresObjetivos' => json_encode($nombresObjetivos) 
        ])->layout('estadisticas.baseEstadisticas');
    }

    public function arregloAspectos ($objetivo){
        $sumatoria = $this->sumatoriaPublic;
        $sumatoriaAspectos = $this->sumatoriaAspectosPublic;
        $valoresAspectos = $this->valoresAspectos;
        $data = [];
        foreach($sumatoria as $key => &$val){
            foreach($sumatoriaAspectos as $keyAspectos => &$valAspectos){
                $data[] = [
                    "name" => ObjetivoEducacional::find($key)->descripcion,
                     "id" => 'objetivo' . $key, 
                     "data" => function($key, $keyAspectos){
                        $valores = [];
                        foreach($this->valoresAspectos as $keyObjetivos => &$valObjetivos){                            
                            if($valObjetivos == $key){
                                $valores[] = [AspectosObjetivos::find($keyAspectos)->nombre, $keyObjetivos];
                            }
                        }
                        return $valores;
                     }
                    //  AspectosObjetivos::find($keyAspectos)->nombre
                    //  $this->arregloAspectos($valAspectos) 
                    ];
            }
        }
        // dd($this->sumatoriaAspectosArray);
        // for($i=0;$i<count($this->sumatoriaAspectosArray);$i ++){
        //     dd($this->sumatoriaAspectosArray[]->);
        // }
        // foreach($this->sumatoriaAspectosArray as $key => &$val){
        //     if($objetivo == $this->valoresAspectos[$key]){
        //         $data[] = [ AspectosObjetivos::find($key)->nombre,  floatval($val)];
        //     }
        // }
        dd($data);
        return $data;
    }
}
