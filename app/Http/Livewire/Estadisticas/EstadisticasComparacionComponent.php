<?php

namespace App\Http\Livewire\Estadisticas;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;
use App\Models\ObjetivoEducacional;
use App\Models\AspectosObjetivos;

class EstadisticasComparacionComponent extends Component
{
    public $tipoSeleccionado2 = '';
    public $carreraSeleccionada2 = '';
    public $añoSeleccionado2 = '';
    public $periodoSeleccionado2 = '';

    public $datos2 = null;
    public $datos2Objetivos = null;
    public $data2Aspectos = null;
    // public $respuestaAtributoArray = null;
    // public $sumatoriaAspectosArray = null;
    // public $valoresAspectos = null;

    // public $sumatoriaPublic = null;
    // public $sumatoriaAspectosPublic = null;
    public $dicAspectos = null;

    public function mount()
    {
        $user = Auth::user();
        // $carreraSeleccionada = \App\Models\Carrera::select('id','carrera')->where('creadopor',$user->id)->first();
    }

    public function render()
    {

        $this->dicAspectos = null;
        $user = Auth::user();
        $carreras = \App\Models\Carrera::select('id', 'carrera')->where('creadopor', $user->id)->get();

        $dataBarrasObjetivos = [];
        $dataAspectos = [];
        $nombreCarreras = [];
        $sumatoria = [];
        $sumatoriaAspectos = [];
        $contadores = [];
        $contadoresAspectos = [];
        $nombresObjetivos = [];
        $nombresAspectos = [];

        if ($this->tipoSeleccionado2 && $this->carreraSeleccionada2 && $this->añoSeleccionado2 && $this->periodoSeleccionado2) {
            if ($this->tipoSeleccionado2 == "Objetivos") {
                $this->limpiar();
                $dataBarrasObjetivos = [];
                $dataAspectos = [];
                $nombreCarreras = [];
                $sumatoria = [];
                $sumatoriaAspectos = [];
                $contadores = [];
                $contadoresAspectos = [];
                $nombresObjetivos = [];
                $nombresAspectos = [];
                // dd('hols');
                $periodo = $this->periodoSeleccionado2 . $this->añoSeleccionado2;
                // dd($periodo);
                $respuestasTemp = db::table('objetivo_educacionals')
                    ->join('objetivo_aspectos', 'objetivo_aspectos.objetivo_educacional_id', '=', 'objetivo_educacionals.id')
                    ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'objetivo_aspectos.aspectos_objetivos_id')
                    ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                    ->join('respuesta_objetivos', 'respuesta_objetivos.idPreguntaAspecto', '=', 'pregunta_aspecto_objetivos.id')
                    // ->join('encuesta_objetivos', 'encuesta_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                    ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.id', '=', 'respuesta_objetivos.idEncuestaAsignada')
                    ->where([['objetivo_educacionals.idCarrera', '=', $this->carreraSeleccionada2], ['encuesta_evaluador_objetivos.periodo', '=', $periodo]]);

                // $respuestasTemp2 = db::table('respuesta_objetivos')
                //     ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.id', '=', 'respuesta_objetivos.idPreguntaAspecto')
                //     ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'pregunta_aspecto_objetivos.idAspectoObjetivo')
                //     ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.id', '=', 'respuesta_objetivos.idEncuestaAsignada')
                //     ->where([['encuesta_evaluador_objetivos.idCarrera', '=', $this->carreraSeleccionada], ['encuesta_evaluador_objetivos.periodo', '=', $periodo]]);

                $respuestasObjetivo = $respuestasTemp->select('objetivo_educacionals.id', 'objetivo_educacionals.descripcion', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo')->get();
                $respuestasAtributos = $respuestasTemp->select('aspectos_objetivos.id', 'aspectos_objetivos.nombre', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo', 'objetivo_educacionals.id as objetivo')->get();
                // $this->respuestaAtributoArray = $respuestasAtributos;
                // ------------------------------ SUMATORIAS ------------------------------
                // dd($respuestasAtributos);
                foreach ($respuestasObjetivo as $item) {

                    if (isset($sumatoria[$item->id])) {
                        $sumatoria[$item->id] += intval($item->respuesta);
                        $contadores[$item->id] += 1;
                    } else {
                        $sumatoria[$item->id] = intval($item->respuesta);
                        $contadores[$item->id] = 1;
                        $nombresObjetivos[] = $item->descripcion;
                    }
                }

                if ($respuestasAtributos) {

                    foreach ($respuestasAtributos as $item) {

                        if (isset($sumatoriaAspectos[$item->id])) {
                            $sumatoriaAspectos[$item->id] += intval($item->respuesta);
                            // $valoresAspectos[$item->objetivo] += intval($item->respuesta);
                            $contadoresAspectos[$item->id] += 1;
                            // ---------Creamos un diccionario con el vlaor del objetivo del aspecto y su sumatoria de las respuestas---------
                            foreach ($this->dicAspectos as $key => &$val) {
                                if ($val["aspecto"] == $item->id) {
                                    $val["valor"] = intval($val["valor"]) + intval($item->respuesta);
                                }
                            }
                            // $this->dicAspectos[] = if(){};
                        } else {
                            $sumatoriaAspectos[$item->id] = intval($item->respuesta);
                            // $this->valoresAspectos[$item->id] = $item->objetivo;
                            $this->dicAspectos[] = ["aspecto" => $item->id, "valor" => intval($item->respuesta), "objetivo" => $item->objetivo];
                            // dd($this->dicAspectos["valor"]);
                            $contadoresAspectos[$item->id] = 1;
                            $nombresAspectos[$item->id] = $item->nombre;
                        }
                    }
                }

                // dd($this->dicAspectos, $sumatoriaAspectos);

                // dd(gettype($sumatoriaAspectos));

                // -------------------------------- PROMEDIOS ----------------------------------------------

                foreach ($sumatoria as $key => &$val) {
                    $sumatoria[$key] = $sumatoria[$key] / $contadores[$key];
                }
                foreach ($sumatoriaAspectos as $key => &$val) {
                    $sumatoriaAspectos[$key] = $sumatoriaAspectos[$key] / $contadoresAspectos[$key];
                    // $valoresAspectos[$key] = $valoresAspectos[$key] / $contadoresAspectos[$key];
                }
                if ($this->dicAspectos != null) {
                    foreach ($this->dicAspectos as $key => &$val) {
                        $val["valor"] = $val["valor"] / $contadoresAspectos[$val["aspecto"]];
                    }
                }


                // dd($this->dicAspectos, $sumatoriaAspectos);

                // $this->sumatoriaPublic = $sumatoria;
                // $this->sumatoriaAspectosPublic = $sumatoriaAspectos;
                // dd($sumatoria);

                // --------------------------------  ----------------------------------------------
                // $this->sumatoriaAspectosArray = $valoresAspectos;
                // dd($valoresAspectos);
                foreach ($sumatoria as $key => &$val) {
                    // $drilldown = ;
                    // $dataBarras[] = [ObjetivoEducacional::find($key)->descripcion, $sumatoria[$key]];
                    // $dataBarras[] = [$sumatoria[$key]];
                    // dd($sumatoriaAspectos);
                    $dataBarrasObjetivos[] = ["name" => ObjetivoEducacional::find($key)->descripcion, "y" => $sumatoria[$key], "drilldown" => 'objetivo' . $key];
                    $dataAspectos[] = ["name" => ObjetivoEducacional::find($key)->descripcion, "colorByPoint" => true, "id" => 'objetivo' . $key, "data" =>  $this->arregloAspectos($key)];
                    // dd($dataAspectos);
                    //  $this->arregloAspectos($key);
                    // foreach ($sumatoriaAspectos as $keyAspectos => &$valAspectos){
                    // $this->arregloAspectos($keyAspectos);
                    // $dataAspectos[] = ["name" => AspectosObjetivos::find($keyAspectos)->nombre, "id" => 'objetivo' . $key, "data" => $this->arregloAspectos($valAspectos) ];
                    // }
                    // dd($sumatoriaAspectos);
                }
                // dd($dataAspectos);
                // dd($sumatoriaAspectos);
                foreach ($sumatoria as $key => &$val) {
                    $dataBarrasObjetivos[] = ["name" => ObjetivoEducacional::find($key)->descripcion, "y" => $sumatoria[$key], "drilldown" => 'objetivo' . $key];
                }


                // $this->datos =  json_encode($dataBarrasObjetivos);
                $this->datos2Objetivos = $dataBarrasObjetivos;
                $this->data2Aspectos = $dataAspectos;
                // dd($dataAspectos);

                // dd($dataAspe);
            }



            // ["name" => ObjetivoEducacional::find($key)->descripcion, "id" => 'objetivo' . $key, "data" => $this->function($objetivo)];
            return view('livewire.estadisticas.estadisticas-comparacion-component', [
                // 'data' => json_encode($dataBarrasObjetivos),
                // 'carreras' => json_encode($nombreCarreras),
                // 'dataBarras3D' => json_encode($dataBarras3D),
                'carreras2' => $carreras,
                // 'sumatoria' => json_encode($sumatoria),
                // 'nombresObjetivos' => json_encode($nombresObjetivos)
            ])->layout('estadisticas.baseEstadisticas');
        } else {
            $this->limpiar();
            $dataBarrasObjetivos = [];
            $dataAspectos = [];
            $nombreCarreras = [];
            $sumatoria = [];
            $sumatoriaAspectos = [];
            $contadores = [];
            $contadoresAspectos = [];
            $nombresObjetivos = [];
            $nombresAspectos = [];
            return view('livewire.estadisticas.estadisticas-comparacion-component', [
                // 'data' => json_encode($dataBarrasObjetivos),
                // 'carreras' => json_encode($nombreCarreras),
                // 'dataBarras3D' => json_encode($dataBarras3D),
                'carreras2' => $carreras,
                // 'sumatoria' => json_encode($sumatoria),
                // 'nombresObjetivos' => json_encode($nombresObjetivos)
            ])->layout('estadisticas.baseEstadisticas');
        }
    }

    public function arregloAspectos($objetivo)
    {
        $data = [];
        // dd($objetivo);
        foreach ($this->dicAspectos as $key => &$val) {
            if ($val["objetivo"] == $objetivo) {
                $data[] = [AspectosObjetivos::find($val["aspecto"])->nombre, $val["valor"]];
            }
        }
        // dd(json_encode($data));
        // $sumatoria = $this->sumatoriaPublic;
        // $sumatoriaAspectos = $this->sumatoriaAspectosPublic;
        // $valoresAspectos = $this->valoresAspectos;
        // $data = [];
        // foreach($sumatoria as $key => &$val){
        //     foreach($sumatoriaAspectos as $keyAspectos => &$valAspectos){
        //         $data[] = [
        //             "name" => ObjetivoEducacional::find($key)->descripcion,
        //              "id" => 'objetivo' . $key,
        //              "data" => function($key, $keyAspectos, $objetivo){
        //                 $valores = [];
        //                 foreach($this->valoresAspectos as $keyObjetivos => &$valObjetivos){
        //                     if($valObjetivos == $objetivo){
        //                         $valores[] = [AspectosObjetivos::find($keyAspectos)->nombre, $keyObjetivos];
        //                     }
        //                 }
        //                 return $valores;
        //              }
        //             //  AspectosObjetivos::find($keyAspectos)->nombre
        //             //  $this->arregloAspectos($valAspectos)
        //             ];
        //     }
        // }
        // dd($this->sumatoriaAspectosArray);
        // for($i=0;$i<count($this->sumatoriaAspectosArray);$i ++){
        //     dd($this->sumatoriaAspectosArray[]->);
        // }
        // foreach($this->sumatoriaAspectosArray as $key => &$val){
        //     if($objetivo == $this->valoresAspectos[$key]){
        //         $data[] = [ AspectosObjetivos::find($key)->nombre,  floatval($val)];
        //     }
        // }
        // dd($data);
        return $data;
    }

    public function limpiar()
    {
        // $this->tipoSeleccionado = '';
        // $this->carreraSeleccionada = '';
        // $this->añoSeleccionado = '';
        // $this->periodoSeleccionado = '';
        $this->datos2 = null;
        $this->datos2Objetivos = null;
        $this->data2Aspectos = null;
        // $this->sumatoriaAspectosArray = null;
        // $this->valoresAspectos = null;
    
        // $this->sumatoriaPublic = null;
        // $this->sumatoriaAspectosPublic = null;
        $this->dicAspectos = null;
    }
}
