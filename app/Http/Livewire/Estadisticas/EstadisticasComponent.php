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
    //variable para saber si se grafica
    public $renderizar = false;

    public $renderizarT2 = false;

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

    public $dataTablaComparativaC1 = null;
    public $dataTablaComparativaC2 = null;
    public $idObjetivos = [];

    protected $listeners = ['resetear'];
    public $termino = false;

    public function mount()
    {
        $user = Auth::user();
    }

    public function render()
    {
        // $this->renderizar = false;
        // $this->renderizarT2 = false;
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
            @$this->renderizar = true;
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
            $this->renderizarT2 = true;
            $this->nombresObjetivosC1 = [];
            $this->idObjetivos = [];
            if ($this->tipoSeleccionadoC1 == "Objetivos") {
                // Se mandan llamar la funcion que limpia las varibales globales para que no duplique información
                $this->limpiarC1();
                // Se crean las variables necearias para extrar los promedios 
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
                // Se hace la consulta a la base de datos
                $respuestasTemp = db::table('objetivo_educacionals')
                    ->join('objetivo_aspectos', 'objetivo_aspectos.objetivo_educacional_id', '=', 'objetivo_educacionals.id')
                    ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'objetivo_aspectos.aspectos_objetivos_id')
                    ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                    ->join('respuesta_objetivos', 'respuesta_objetivos.idPreguntaAspecto', '=', 'pregunta_aspecto_objetivos.id')
                    ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.id', '=', 'respuesta_objetivos.idEncuestaAsignada')
                    ->where([['objetivo_educacionals.idCarrera', '=', $this->carreraSeleccionadaC1], ['encuesta_evaluador_objetivos.periodo', '=', $periodo]]);

                $respuestasC2 = $respuestasTemp->select('aspectos_objetivos.id', 'aspectos_objetivos.nombre', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo', 'objetivo_educacionals.id as objetivo')->get();
                $respuestasAtributos = $respuestasTemp->select('aspectos_objetivos.id', 'aspectos_objetivos.nombre', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo', 'objetivo_educacionals.id as objetivo')->get();
                // ------------------------------ SUMATORIAS ------------------------------

                if ($respuestasAtributos) {
                    // 
                    // Se suman los valores de las repsuestas y se agrupan por asepcto
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
                    // Se obtiene el promedio por aspecto
                    if ($this->dicAspectosC1 != null) {
                        foreach ($this->dicAspectosC1 as $key => &$val) {
                            $val["valor"] = $val["valor"] / $contadoresAspectos[$val["aspecto"]];
                        }
                    }

                    // se reinicican las variables para podr obtener la sumatoria del promedio por objetivo
                    $sumatoriaAspectos = [];
                    $contadoresAspectos = [];
                    // dd($sumatoriaAspectos);
                    if ($this->dicAspectosC1) {
                        foreach ($this->dicAspectosC1 as $key => &$val) {
                            if (isset($sumatoriaAspectos[$val["objetivo"]])) {
                                $sumatoriaAspectos[$val["objetivo"]] += floatval($val["valor"]);
                                $contadoresAspectos[$val["objetivo"]] += 1;
                            } else {
                                $sumatoriaAspectos[$val["objetivo"]] = floatval($val["valor"]);
                                $contadoresAspectos[$val["objetivo"]] = 1;
                            }
                        }
                    }
                }

                // -------------------------------- PROMEDIOS ----------------------------------------------
                // se obtiene el pormedio por objetivo segun los aspectos que tenga
                if ($sumatoriaAspectos) {
                    foreach ($sumatoriaAspectos as $key => &$val) {
                        $sumatoriaAspectos[$key] = $sumatoriaAspectos[$key] / $contadoresAspectos[$key];
                    }

                    // se crea el arreglo con el nombre de todos los objetivos para mostrarlo en la tabla 
                    // en la seccion de category
                    foreach ($sumatoriaAspectos as $key => &$val) {
                        if (isset($this->idObjetivos[$key])) {
                            $this->nombresObjetivosC1[] = "hola";
                        } else {
                            $this->nombresObjetivosC1[] = ObjetivoEducacional::find($key)->descripcion;
                            $this->idObjetivos[$key] = $key;
                        }
                        // $idObjetivos[$key] = $key;
                    }

                    // se compara idObjetivos para saber si existe en nuestra sumatria para poner el valor por default en 0;
                    foreach ($this->idObjetivos as $key => &$val) {
                        if (isset($sumatoriaAspectos[$key])) {
                            $this->dataTablaComparativaC1[] = $sumatoriaAspectos[$key];
                        } else {
                            $this->dataTablaComparativaC1[] = 0;
                        }
                    }
                }
            }
            if ($this->tipoSeleccionadoC2 == "Objetivos") {
                // Se mandan llamar la funcion que limpia las varibales globales para que no duplique información
                $this->limpiarC2();
                // Se crean las variables necearias para extrar los promedios 
                $dataBarrasObjetivos = [];
                $dataAspectos = [];
                $nombreCarreras = [];
                $sumatoria = [];
                $sumatoriaAspectos = [];
                $contadores = [];
                $contadoresAspectos = [];
                // $nombresAspectos = [];
                $periodo = $this->periodoSeleccionadoC2 . $this->añoSeleccionadoC2;
                // Se hace la consulta a la base de datos
                $respuestasTemp = db::table('objetivo_educacionals')
                    ->join('objetivo_aspectos', 'objetivo_aspectos.objetivo_educacional_id', '=', 'objetivo_educacionals.id')
                    ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'objetivo_aspectos.aspectos_objetivos_id')
                    ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                    ->join('respuesta_objetivos', 'respuesta_objetivos.idPreguntaAspecto', '=', 'pregunta_aspecto_objetivos.id')
                    ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.id', '=', 'respuesta_objetivos.idEncuestaAsignada')
                    ->where([['objetivo_educacionals.idCarrera', '=', $this->carreraSeleccionadaC2], ['encuesta_evaluador_objetivos.periodo', '=', $periodo]]);

                $respuestasC2 = $respuestasTemp->select('aspectos_objetivos.id', 'aspectos_objetivos.nombre', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo', 'objetivo_educacionals.id as objetivo')->get();
                $respuestasAtributos = $respuestasTemp->select('aspectos_objetivos.id', 'aspectos_objetivos.nombre', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo', 'objetivo_educacionals.id as objetivo')->get();
                // ------------------------------ SUMATORIAS ------------------------------

                if ($respuestasAtributos) {
                    // 
                    // Se suman los valores de las repsuestas y se agrupan por asepcto
                    foreach ($respuestasAtributos as $item) {

                        if (isset($sumatoriaAspectos[$item->id])) {
                            $sumatoriaAspectos[$item->id] += intval($item->respuesta);
                            $contadoresAspectos[$item->id] += 1;
                            // ---------Creamos un diccionario con el vlaor del objetivo del aspecto y su sumatoria de las respuestas---------
                            foreach ($this->dicAspectosC2 as $key => &$val) {
                                if ($val["aspecto"] == $item->id) {
                                    $val["valor"] = intval($val["valor"]) + intval($item->respuesta);
                                }
                            }
                        } else {
                            $sumatoriaAspectos[$item->id] = intval($item->respuesta);
                            $this->dicAspectosC2[] = ["aspecto" => $item->id, "valor" => intval($item->respuesta), "objetivo" => $item->objetivo];
                            $contadoresAspectos[$item->id] = 1;
                            // $nombresAspectos[$item->id] = $item->nombre;
                        }
                    }
                    // Se obtiene el promedio por aspecto
                    if ($this->dicAspectosC2 != null) {
                        foreach ($this->dicAspectosC2 as $key => &$val) {
                            $val["valor"] = $val["valor"] / $contadoresAspectos[$val["aspecto"]];
                        }
                    }

                    // se reinicican las variables para podr obtener la sumatoria del promedio por objetivo
                    $sumatoriaAspectos = [];
                    $contadoresAspectos = [];
                    if ($this->dicAspectosC2) {

                        foreach ($this->dicAspectosC2 as $key => &$val) {
                            if (isset($sumatoriaAspectos[$val["objetivo"]])) {
                                $sumatoriaAspectos[$val["objetivo"]] += floatval($val["valor"]);
                                $contadoresAspectos[$val["objetivo"]] += 1;
                            } else {
                                $sumatoriaAspectos[$val["objetivo"]] = floatval($val["valor"]);
                                // $this->dicAspectosC1[] = ["aspecto" => $item->id, "valor" => intval($item->respuesta), "objetivo" => $item->objetivo];
                                $contadoresAspectos[$val["objetivo"]] = 1;
                                // $nombresAspectos[$item->id] = $item->nombre;
                            }
                        }
                    }
                }

                // -------------------------------- PROMEDIOS ----------------------------------------------
                // se obtiene el pormedio por objetivo segun los aspectos que tenga
                if ($sumatoriaAspectos) {
                    foreach ($sumatoriaAspectos as $key => &$val) {
                        $sumatoriaAspectos[$key] = $sumatoriaAspectos[$key] / $contadoresAspectos[$key];
                    }



                    // se crea el arreglo con el nombre de todos los objetivos para mostrarlo en la tabla 
                    // en la seccion de category
                    foreach ($sumatoriaAspectos as $key => &$val) {
                        if (isset($this->idObjetivos[$key])) {
                        } else {
                            $this->nombresObjetivosC1[] = ObjetivoEducacional::find($key)->descripcion;
                            $this->idObjetivos[$key] = $key;
                        }
                    }
                    // se compara idObjetivos para saber si existe en nuestra sumatria para poner el valor por default en 0;
                    foreach ($this->idObjetivos as $key => &$val) {
                        if (isset($sumatoriaAspectos[$key])) {
                            $this->dataTablaComparativaC2[] = $sumatoriaAspectos[$key];
                        } else {
                            $this->dataTablaComparativaC2[] = 0;
                        }
                    }
                }
            }
        }

        return view('livewire.estadisticas.estadisticas-component', [
            'carreras2' => $carreras,
            'objetivos' => json_encode($this->nombresObjetivosC1),
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
        $this->dataTablaComparativaC1 = null;
    }
    public function limpiarC2()
    {
        $this->datosC2 = null;
        $this->datosObjetivosC2 = null;
        $this->dataAspectosC2 = null;
        $this->dicAspectosC2 = null;
        $this->dataTablaComparativaC2 = null;
    }
    public function resetear()
    {
        $this->renderizar = false;
        $this->renderizarT2 = false;
    }
}
