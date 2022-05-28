<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;
use App\Models\ObjetivoEducacional;
use App\Models\Atributo;
use App\Models\AspectosObjetivos;
use App\Models\AspectosAtributos;
use Illuminate\Support\Facades\Auth;

class MetasComponent extends Component
{

    public $renderizarT3 = false;
    public $tipoSeleccionadoC3 = '';
    public $carreraSeleccionadaC3 = '';
    public $periodoSeleccionadoC3 = '';
    public $añoSeleccionadoC3 = '';
    public $encuestasC3 = null;
    public $evaluadoresC3 = null;
    public $tablaC3 = '';
    public $dicAspectosC3 = null;
    public $nombresObjetivosC3 = null;
    public $idObjetivosC3 = [];
    public $dataColumnaMetas = [];
    public $dataMetas = [];
    public function render()
    {


        $user = Auth::user();
        $carreras = \App\Models\Carrera::select('id', 'carrera', 'planEstudios')->where('creadopor', $user->id)->get();

        if ($this->tipoSeleccionadoC3 && $this->carreraSeleccionadaC3 && $this->añoSeleccionadoC3 && $this->periodoSeleccionadoC3) {
            $this->renderizarT3 = true;
            $this->nombresObjetivosC3 = [];
            $this->idObjetivosC3 = [];
            if ($this->tipoSeleccionadoC3 == "Objetivos") {
                // Se mandan llamar la funcion que limpia las varibales globales para que no duplique información
                $this->limpiarC3();
                // Se crean las variables necearias para extrar los promedios 
                $dataBarrasObjetivos = [];
                $dataAspectos = [];
                $sumatoria = [];
                $sumatoriaAspectos = [];
                $contadores = [];
                $contadoresAspectos = [];
                $periodo = $this->periodoSeleccionadoC3 . $this->añoSeleccionadoC3;
                $this->tablaC3 = \App\Models\Carrera::find($this->carreraSeleccionadaC3)->carrera . " | ". \App\Models\Carrera::find($this->carreraSeleccionadaC3)->planEstudios." "  . $this->periodoSeleccionadoC3 . $this->añoSeleccionadoC3;
                // Se hace la consulta a la base de datos
                $respuestasTemp = db::table('objetivo_educacionals')
                    ->join('objetivo_aspectos', 'objetivo_aspectos.objetivo_educacional_id', '=', 'objetivo_educacionals.id')
                    ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'objetivo_aspectos.aspectos_objetivos_id')
                    ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                    ->join('respuesta_objetivos', 'respuesta_objetivos.idPreguntaAspecto', '=', 'pregunta_aspecto_objetivos.id')
                    ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.id', '=', 'respuesta_objetivos.idEncuestaAsignada')
                    ->where([['objetivo_educacionals.idCarrera', '=', $this->carreraSeleccionadaC3], ['encuesta_evaluador_objetivos.periodo', '=', $periodo]]);

                $respuestasAtributos = $respuestasTemp->select('aspectos_objetivos.id', 'aspectos_objetivos.nombre', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo', 'objetivo_educacionals.id as objetivo')->get();

                $this->encuestasC3 = db::table('encuesta_evaluador_objetivos')
                    ->where([
                        ['idCarrera', '=', $this->carreraSeleccionadaC3],
                        ['periodo', '=', $periodo]
                    ])
                    ->get();
                $this->evaluadoresC3 = db::table('encuesta_evaluador_objetivos')
                    ->select('evaluador')
                    ->where([
                        ['idCarrera', '=', $this->carreraSeleccionadaC3],
                        ['periodo', '=', $periodo]
                    ])
                    ->groupBy('evaluador')
                    ->get();
                // dd($this->evaluadoresC1);
                // ------------------------------ SUMATORIAS ------------------------------

                if ($respuestasAtributos) {
                    // 
                    // Se suman los valores de las repsuestas y se agrupan por asepcto
                    foreach ($respuestasAtributos as $item) {

                        if (isset($sumatoriaAspectos[$item->id])) {
                            $sumatoriaAspectos[$item->id] += intval($item->respuesta);
                            $contadoresAspectos[$item->id] += 1;
                            // ---------Creamos un diccionario con el vlaor del objetivo del aspecto y su sumatoria de las respuestas---------
                            foreach ($this->dicAspectosC3 as $key => &$val) {
                                if ($val["aspecto"] == $item->id) {
                                    $val["valor"] = intval($val["valor"]) + intval($item->respuesta);
                                }
                            }
                        } else {
                            $sumatoriaAspectos[$item->id] = intval($item->respuesta);
                            $this->dicAspectosC3[] = ["aspecto" => $item->id, "valor" => intval($item->respuesta), "objetivo" => $item->objetivo];
                            $contadoresAspectos[$item->id] = 1;
                            // $nombresAspectos[$item->id] = $item->nombre;
                        }
                    }
                    // Se obtiene el promedio por aspecto
                    if ($this->dicAspectosC3 != null) {
                        // dd($this->dicAspectosC3, $contadoresAspectos);
                        foreach ($this->dicAspectosC3 as $key => &$val) {
                            $val["valor"] = $val["valor"] / $contadoresAspectos[$val["aspecto"]];
                        }
                    }

                    // se reinicican las variables para podr obtener la sumatoria del promedio por objetivo
                    $sumatoriaAspectos = [];
                    $contadoresAspectos = [];
                    // dd($sumatoriaAspectos);
                    if ($this->dicAspectosC3) {
                        foreach ($this->dicAspectosC3 as $key => &$val) {
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

                    // dd($sumatoriaAspectos, $this->dicAspectosC3);

                    // se crea el arreglo con el nombre de todos los objetivos para mostrarlo en la tabla 
                    // en la seccion de category
                    foreach ($sumatoriaAspectos as $key => &$val) {
                        if (isset($this->idObjetivosC3[$key])) {
                            $this->nombresObjetivosC3[] = "hola";
                        } else {
                            $this->nombresObjetivosC3[] = ObjetivoEducacional::find($key)->descripcion;
                            $this->idObjetivosC3[$key] = $key;
                        }
                        // $idObjetivos[$key] = $key;
                    }

                    //data de las barras por objetivo
                    foreach ($sumatoriaAspectos as $key => &$val) {
                        $this->dataColumnaMetas[] = $val;
                    }

                    //data de la linea de metas
                    foreach ($this->idObjetivosC3 as $key => &$val) {
                        $this->dataMetas[] = floatval(ObjetivoEducacional::find($key)->meta);
                    }
                    // dd($this->dataMetas);
                    // dd($sumatoriaAspectos, $this->nombresObjetivosC3, $this->idObjetivosC3);

                    // se compara idObjetivos para saber si existe en nuestra sumatria para poner el valor por default en 0;

                }
            } else {
                // Se mandan llamar la funcion que limpia las varibales globales para que no duplique información
                $this->limpiarC3();
                // Se crean las variables necearias para extrar los promedios 
                $dataBarrasObjetivos = [];
                $dataAspectos = [];
                $sumatoria = [];
                $sumatoriaAspectos = [];
                $contadores = [];
                $contadoresAspectos = [];
                $periodo = $this->periodoSeleccionadoC3 . $this->añoSeleccionadoC3;
                $this->tablaC3 = \App\Models\Carrera::find($this->carreraSeleccionadaC3)->carrera . " | " . \App\Models\Carrera::find($this->carreraSeleccionadaC3)->planEstudios. " " . $this->periodoSeleccionadoC3 . $this->añoSeleccionadoC3;
                // Se hace la consulta a la base de datos
                $respuestasTemp = db::table('atributos')
                    ->join('atributo_aspectos', 'atributo_aspectos.atributo_id', '=', 'atributos.id')
                    ->join('aspectos_atributos', 'aspectos_atributos.id', '=', 'atributo_aspectos.aspectos_atributos_id')
                    ->join('pregunta_aspecto_atributos', 'pregunta_aspecto_atributos.idAspectoAtributo', '=', 'aspectos_atributos.id')
                    ->join('respuesta_atributos', 'respuesta_atributos.idPreguntaAspecto', '=', 'pregunta_aspecto_atributos.id')
                    ->join('encuesta_evaluador_atributos', 'encuesta_evaluador_atributos.id', '=', 'respuesta_atributos.idEncuestaAsignada')
                    ->where([['atributos.idCarrera', '=', $this->carreraSeleccionadaC3], ['encuesta_evaluador_atributos.periodo', '=', $periodo]]);

                $respuestasAtributos = $respuestasTemp->select('aspectos_atributos.id', 'aspectos_atributos.nombre', 'respuesta_atributos.respuesta', 'encuesta_evaluador_atributos.periodo', 'atributos.id as atributo')->get();

                $this->encuestasC3 = db::table('encuesta_evaluador_atributos')
                    ->where([
                        ['idCarrera', '=', $this->carreraSeleccionadaC3],
                        ['periodo', '=', $periodo]
                    ])
                    ->get();
                $this->evaluadoresC3 = db::table('encuesta_evaluador_atributos')
                    ->select('evaluador')
                    ->where([
                        ['idCarrera', '=', $this->carreraSeleccionadaC3],
                        ['periodo', '=', $periodo]
                    ])
                    ->groupBy('evaluador')
                    ->get();
                // dd($this->evaluadoresC1);
                // ------------------------------ SUMATORIAS ------------------------------

                if ($respuestasAtributos) {
                    // 
                    // Se suman los valores de las repsuestas y se agrupan por asepcto
                    foreach ($respuestasAtributos as $item) {

                        if (isset($sumatoriaAspectos[$item->id])) {
                            $sumatoriaAspectos[$item->id] += intval($item->respuesta);
                            $contadoresAspectos[$item->id] += 1;
                            // ---------Creamos un diccionario con el vlaor del objetivo del aspecto y su sumatoria de las respuestas---------
                            foreach ($this->dicAspectosC3 as $key => &$val) {
                                if ($val["aspecto"] == $item->id) {
                                    $val["valor"] = intval($val["valor"]) + intval($item->respuesta);
                                }
                            }
                        } else {
                            $sumatoriaAspectos[$item->id] = intval($item->respuesta);
                            $this->dicAspectosC3[] = ["aspecto" => $item->id, "valor" => intval($item->respuesta), "atributo" => $item->atributo];
                            $contadoresAspectos[$item->id] = 1;
                            // $nombresAspectos[$item->id] = $item->nombre;
                        }
                    }
                    // Se obtiene el promedio por aspecto
                    if ($this->dicAspectosC3 != null) {
                        // dd($this->dicAspectosC3, $contadoresAspectos);
                        foreach ($this->dicAspectosC3 as $key => &$val) {
                            $val["valor"] = $val["valor"] / $contadoresAspectos[$val["aspecto"]];
                        }
                    }

                    // se reinicican las variables para podr obtener la sumatoria del promedio por objetivo
                    $sumatoriaAspectos = [];
                    $contadoresAspectos = [];
                    // dd($sumatoriaAspectos);
                    if ($this->dicAspectosC3) {
                        foreach ($this->dicAspectosC3 as $key => &$val) {
                            if (isset($sumatoriaAspectos[$val["atributo"]])) {
                                $sumatoriaAspectos[$val["atributo"]] += floatval($val["valor"]);
                                $contadoresAspectos[$val["atributo"]] += 1;
                            } else {
                                $sumatoriaAspectos[$val["atributo"]] = floatval($val["valor"]);
                                $contadoresAspectos[$val["atributo"]] = 1;
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

                    // dd($sumatoriaAspectos, $this->dicAspectosC3);

                    // se crea el arreglo con el nombre de todos los objetivos para mostrarlo en la tabla 
                    // en la seccion de category
                    foreach ($sumatoriaAspectos as $key => &$val) {
                        if (isset($this->idObjetivosC3[$key])) {
                            $this->nombresObjetivosC3[] = "hola";
                        } else {
                            $this->nombresObjetivosC3[] = Atributo::find($key)->descripcion;
                            $this->idObjetivosC3[$key] = $key;
                        }
                        // $idObjetivos[$key] = $key;
                    }

                    //data de las barras por objetivo
                    foreach ($sumatoriaAspectos as $key => &$val) {
                        $this->dataColumnaMetas[] = $val;
                    }

                    //data de la linea de metas
                    foreach ($this->idObjetivosC3 as $key => &$val) {
                        $this->dataMetas[] = floatval(Atributo::find($key)->meta);
                    }
                    // dd($this->dataMetas);
                    // dd($sumatoriaAspectos, $this->nombresObjetivosC3, $this->idObjetivosC3);

                    // se compara idObjetivos para saber si existe en nuestra sumatria para poner el valor por default en 0;

                }
            }
        }




        return view('livewire.dashboard.metas-component');
    }
}
