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
    public $dicAspectos = null;

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
                $periodo = $this->periodoSeleccionado2 . $this->añoSeleccionado2;
                $respuestasTemp = db::table('objetivo_educacionals')
                    ->join('objetivo_aspectos', 'objetivo_aspectos.objetivo_educacional_id', '=', 'objetivo_educacionals.id')
                    ->join('aspectos_objetivos', 'aspectos_objetivos.id', '=', 'objetivo_aspectos.aspectos_objetivos_id')
                    ->join('pregunta_aspecto_objetivos', 'pregunta_aspecto_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                    ->join('respuesta_objetivos', 'respuesta_objetivos.idPreguntaAspecto', '=', 'pregunta_aspecto_objetivos.id')
                    // ->join('encuesta_objetivos', 'encuesta_objetivos.idAspectoObjetivo', '=', 'aspectos_objetivos.id')
                    ->join('encuesta_evaluador_objetivos', 'encuesta_evaluador_objetivos.id', '=', 'respuesta_objetivos.idEncuestaAsignada')
                    ->where([['objetivo_educacionals.idCarrera', '=', $this->carreraSeleccionada2], ['encuesta_evaluador_objetivos.periodo', '=', $periodo]]);
                $respuestasObjetivo = $respuestasTemp->select('objetivo_educacionals.id', 'objetivo_educacionals.descripcion', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo')->get();
                $respuestasAtributos = $respuestasTemp->select('aspectos_objetivos.id', 'aspectos_objetivos.nombre', 'respuesta_objetivos.respuesta', 'encuesta_evaluador_objetivos.periodo', 'objetivo_educacionals.id as objetivo')->get();

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
                            $nombresAspectos[$item->id] = $item->nombre;
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
                $this->datos2Objetivos = $dataBarrasObjetivos;
                $this->data2Aspectos = $dataAspectos;
            }

            return view('livewire.estadisticas.estadisticas-comparacion-component', [
                'carreras2' => $carreras,
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
                'carreras2' => $carreras,
            ])->layout('estadisticas.baseEstadisticas');
        }
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
        $this->datos2 = null;
        $this->datos2Objetivos = null;
        $this->data2Aspectos = null;
        $this->dicAspectos = null;
    }
}
