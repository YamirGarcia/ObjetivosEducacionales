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

    // Varibales para la primer tabla
    public $tipoSeleccionado = '';
    public $carreraSeleccionada = '';
    public $añoSeleccionado = '';
    public $periodoSeleccionado = '';
    public $datos = null;
    public $datosObjetivos = null;
    public $dataAspectos = null;
    public $dicAspectos = null;

    // Variables para la tabla comparativa
    public $tipoSeleccionadoC1 = '';
    public $carreraSeleccionadaC1 = '';
    public $periodoSeleccionadoC1 = '';
    public $añoSeleccionadoC1 = '';
    public $datosC1 = null;
    public $datosObjetivosC1 = null;
    public $dataAspectosC1 = null;
    public $dicAspectosC1 = null;
    public $nombresObjetivosC1 = null;


    public $tipoSeleccionadoC2 = '';
    public $carreraSeleccionadaC2 = '';
    public $periodoSeleccionadoC2 = '';
    public $añoSeleccionadoC2 = '';

    public function mount()
    {
        $user = Auth::user();
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
        // $nombresAspectos = [];

        // if para la primer tabla
        if ($this->tipoSeleccionado && $this->carreraSeleccionada && $this->añoSeleccionado && $this->periodoSeleccionado) {
            if ($this->tipoSeleccionado == "Objetivos") {
                $this->limpiar();
                $dataBarrasObjetivos = [];
                $dataAspectos = [];
                $nombreCarreras = [];
                $sumatoria = [];
                $sumatoriaAspectos = [];
                $contadores = [];
                $contadoresAspectos = [];
                $nombresObjetivos = [];
                // $nombresAspectos = [];
                $periodo = $this->periodoSeleccionado . $this->añoSeleccionado;
                $respuestasTemp = db::table('objetivo_educacionals')
                    ->join('objetivo_aspectos', 'objetivo_aspectos.objetivo_educacional_id', '=', 'objetivo_educacionals.id')
                    ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'objetivo_aspectos.aspectos_objetivos_id')
                    ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                    ->join('respuesta_objetivos', 'respuesta_objetivos.idPreguntaAspecto', '=', 'pregunta_aspecto_objetivos.id')
                    ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.id', '=', 'respuesta_objetivos.idEncuestaAsignada')
                    ->where([['objetivo_educacionals.idCarrera', '=', $this->carreraSeleccionada], ['encuesta_evaluador_objetivos.periodo', '=', $periodo]]);

                $respuestasObjetivo = $respuestasTemp->select('objetivo_educacionals.id', 'objetivo_educacionals.descripcion', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo')->get();
                $respuestasAtributos = $respuestasTemp->select('aspectos_objetivos.id', 'aspectos_objetivos.nombre', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo', 'objetivo_educacionals.id as objetivo')->get();
                // ------------------------------ SUMATORIAS ------------------------------
                foreach ($respuestasObjetivo as $item) {

                    if (isset($sumatoria[$item->id])) {
                        $sumatoria[$item->id] += intval($item->respuesta);
                        $contadores[$item->id] += 1;
                    } else {
                        $sumatoria[$item->id] = intval($item->respuesta);
                        $contadores[$item->id] = 1;
                    }
                }

                if ($respuestasAtributos) {

                    foreach ($respuestasAtributos as $item) {

                        if (isset($sumatoriaAspectos[$item->id])) {
                            $sumatoriaAspectos[$item->id] += intval($item->respuesta);
                            $contadoresAspectos[$item->id] += 1;
                            // ---------Creamos un diccionario con el vlaor del objetivo del aspecto y su sumatoria de las respuestas---------
                            foreach ($this->dicAspectos as $key => &$val) {
                                if ($val["aspecto"] == $item->id) {
                                    $val["valor"] = intval($val["valor"]) + intval($item->respuesta);
                                }
                            }
                        } else {
                            $sumatoriaAspectos[$item->id] = intval($item->respuesta);
                            $this->dicAspectos[] = ["aspecto" => $item->id, "valor" => intval($item->respuesta), "objetivo" => $item->objetivo];
                            $contadoresAspectos[$item->id] = 1;
                            // $nombresAspectos[$item->id] = $item->nombre;
                        }
                    }
                }

                // -------------------------------- PROMEDIOS ----------------------------------------------

                foreach ($sumatoria as $key => &$val) {
                    $sumatoria[$key] = $sumatoria[$key] / $contadores[$key];
                }
                foreach ($sumatoriaAspectos as $key => &$val) {
                    $sumatoriaAspectos[$key] = $sumatoriaAspectos[$key] / $contadoresAspectos[$key];
                }
                if ($this->dicAspectos != null) {
                    foreach ($this->dicAspectos as $key => &$val) {
                        $val["valor"] = $val["valor"] / $contadoresAspectos[$val["aspecto"]];
                    }
                }
                foreach ($sumatoria as $key => &$val) {
                    $dataBarrasObjetivos[] = ["name" => ObjetivoEducacional::find($key)->descripcion, "y" => $sumatoria[$key], "drilldown" => 'objetivo' . $key];
                    $dataAspectos[] = ["name" => ObjetivoEducacional::find($key)->descripcion, "colorByPoint" => true, "id" => 'objetivo' . $key, "data" =>  $this->arregloAspectos($key)];
                }
                foreach ($sumatoria as $key => &$val) {
                    $dataBarrasObjetivos[] = ["name" => ObjetivoEducacional::find($key)->descripcion, "y" => $sumatoria[$key], "drilldown" => 'objetivo' . $key];
                }
                $this->datosObjetivos = $dataBarrasObjetivos;
                $this->dataAspectos = $dataAspectos;
            }
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
            // $nombresAspectos = [];
        }

        // if de la tabla comparativa
        if ($this->tipoSeleccionadoC1 && $this->carreraSeleccionadaC1 && $this->añoSeleccionadoC1 && $this->periodoSeleccionadoC2 && $this->tipoSeleccionadoC2 && $this->carreraSeleccionadaC2 && $this->añoSeleccionadoC2 && $this->periodoSeleccionadoC2) {
            if ($this->tipoSeleccionadoC1 == "Objetivos") {
                $this->limpiarC1();
                $dataBarrasObjetivos = [];
                $dataAspectos = [];
                $nombreCarreras = [];
                $sumatoria = [];
                $sumatoriaAspectos = [];
                $contadores = [];
                $contadoresAspectos = [];
                $nombresObjetivos = [];
                // $nombresAspectos = [];
                $periodo = $this->periodoSeleccionadoC1 . $this->añoSeleccionadoC1;
                $respuestasTemp = db::table('objetivo_educacionals')
                    ->join('objetivo_aspectos', 'objetivo_aspectos.objetivo_educacional_id', '=', 'objetivo_educacionals.id')
                    ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'objetivo_aspectos.aspectos_objetivos_id')
                    ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                    ->join('respuesta_objetivos', 'respuesta_objetivos.idPreguntaAspecto', '=', 'pregunta_aspecto_objetivos.id')
                    ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.id', '=', 'respuesta_objetivos.idEncuestaAsignada')
                    ->where([['objetivo_educacionals.idCarrera', '=', $this->carreraSeleccionadaC1], ['encuesta_evaluador_objetivos.periodo', '=', $periodo]]);

                $respuestasObjetivo = $respuestasTemp->select('objetivo_educacionals.id', 'objetivo_educacionals.descripcion', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo')->get();
                $respuestasAtributos = $respuestasTemp->select('aspectos_objetivos.id', 'aspectos_objetivos.nombre', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo', 'objetivo_educacionals.id as objetivo')->get();
                // ------------------------------ SUMATORIAS ------------------------------
                foreach ($respuestasObjetivo as $item) {

                    if (isset($sumatoria[$item->id])) {
                        $sumatoria[$item->id] += intval($item->respuesta);
                        $contadores[$item->id] += 1;
                    } else {
                        $sumatoria[$item->id] = intval($item->respuesta);
                        $contadores[$item->id] = 1;
                        // $nombresObjetivos[] = $item->descripcion;
                    }
                }

                if ($respuestasAtributos) {

                    foreach ($respuestasAtributos as $item) {

                        if (isset($sumatoriaAspectos[$item->id])) {
                            $sumatoriaAspectos[$item->id] += intval($item->respuesta);
                            $contadoresAspectos[$item->id] += 1;
                            // ---------Creamos un diccionario con el vlaor del objetivo del aspecto y su sumatoria de las respuestas---------
                            foreach ($this->dicAspectosC1 as $key => &$val) {
                                if ($val["aspecto"] == $item->id) {
                                    $val["valor"] = intval($val["valor"]) + intval($item->respuesta);
                                }
                            }
                        } else {
                            $sumatoriaAspectos[$item->id] = intval($item->respuesta);
                            $this->dicAspectosC1[] = ["aspecto" => $item->id, "valor" => intval($item->respuesta), "objetivo" => $item->objetivo];
                            $contadoresAspectos[$item->id] = 1;
                            // $nombresAspectos[$item->id] = $item->nombre;
                        }
                    }

                    if ($this->dicAspectosC1 != null) {
                        foreach ($this->dicAspectosC1 as $key => &$val) {
                            $val["valor"] = $val["valor"] / $contadoresAspectos[$val["aspecto"]];
                        }
                    }
                    // dd($this->dicAspectosC1);

                    $sumatoriaAspectos = [];
                    $contadoresAspectos = [];
                    // dd($sumatoriaAspectos);
                    foreach ($this->dicAspectosC1 as $key => &$val) {
                        if (isset($sumatoriaAspectos[$val["objetivo"]])) {
                            $sumatoriaAspectos[$val["objetivo"]] += floatval($val["valor"]);
                            $contadoresAspectos[$val["objetivo"]] += 1;
                            // ---------Creamos un diccionario con el vlaor del objetivo del aspecto y su sumatoria de las respuestas---------
                            // foreach ($this->dicAspectosC1 as $key => &$val) {
                            //     if ($val["aspecto"] == $item->id) {
                            //         $val["valor"] = intval($val["valor"]) + intval($item->respuesta);
                            //     }
                            // }
                        } else {
                            $sumatoriaAspectos[$val["objetivo"]] = floatval($val["valor"]);
                            // $this->dicAspectosC1[] = ["aspecto" => $item->id, "valor" => intval($item->respuesta), "objetivo" => $item->objetivo];
                            $contadoresAspectos[$val["objetivo"]] = 1;
                            // $nombresAspectos[$item->id] = $item->nombre;
                        }
                        // if ($val["aspecto"] == $item->id) {
                        //     $val["valor"] = intval($val["valor"]) + intval($item->respuesta);
                        // }
                    }
                }

                // -------------------------------- PROMEDIOS ----------------------------------------------
                // se obtiene el pormedio por objetivo segun los aspectos que tenga
                foreach ($sumatoriaAspectos as $key => &$val) {
                    $sumatoriaAspectos[$key] = $sumatoriaAspectos[$key] / $contadoresAspectos[$key];
                }

                // se crea el arreglo con el nombre de todos los objetivos para mostrarlo en la tabla 
                // en la seccion de category
                foreach ($sumatoriaAspectos as $key => &$val) {
                    $nombresObjetivos[] = ObjetivoEducacional::find($key)->descripcion;
                }
                // dd($nombresObjetivos);

                // foreach ($sumatoria as $key => &$val) {
                //     $sumatoria[$key] = $sumatoria[$key] / $contadores[$key];
                // }
                // if ($this->dicAspectosC1 != null) {
                //     foreach ($this->dicAspectosC1 as $key => &$val) {
                //         $val["valor"] = $val["valor"] / $contadoresAspectos[$val["aspecto"]];
                //     }
                // }
                // foreach ($sumatoria as $key => &$val) {
                //     $dataBarrasObjetivos[] = ["name" => ObjetivoEducacional::find($key)->descripcion, "y" => $sumatoria[$key], "drilldown" => 'objetivo' . $key];
                //     $dataAspectos[] = ["name" => ObjetivoEducacional::find($key)->descripcion, "colorByPoint" => true, "id" => 'objetivo' . $key, "data" =>  $this->arregloAspectos($key)];
                // }
                // foreach ($sumatoria as $key => &$val) {
                //     $dataBarrasObjetivos[] = ["name" => ObjetivoEducacional::find($key)->descripcion, "y" => $sumatoria[$key], "drilldown" => 'objetivo' . $key];
                // }
                $this->datosObjetivosC1 = $dataBarrasObjetivos;
                $this->dataAspectosC1 = $dataAspectos;
                $this->nombresObjetivosC1 = $nombresObjetivos;
                // dd($this->nombresObjetivosC1);
            }
        }

        return view('livewire.estadisticas.estadisticas-component', [
            'carreras2' => $carreras,
        ])->layout('estadisticas.baseEstadisticas');
    }

    public function arregloAspectos($objetivo)
    {
        $data = [];
        foreach ($this->dicAspectos as $key => &$val) {
            if ($val["objetivo"] == $objetivo) {
                $data[] = [AspectosObjetivos::find($val["aspecto"])->nombre, $val["valor"]];
            }
        }
        return $data;
    }

    public function limpiar()
    {
        $this->datos = null;
        $this->datosObjetivos = null;
        $this->dataAspectos = null;
        $this->dicAspectos = null;
    }

    public function limpiarC1()
    {
        $this->datosC1 = null;
        $this->datosObjetivosC1 = null;
        $this->dataAspectosC1 = null;
        $this->dicAspectosC1 = null;
    }
}
