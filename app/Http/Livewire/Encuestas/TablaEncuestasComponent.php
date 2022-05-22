<?php

namespace App\Http\Livewire\Encuestas;

use Livewire\Component;
use App\Models\Evaluador;
use App\Models\Carrera;
use App\Models\User;
use App\Models\EncuestaEvaluadorObjetivo;
use App\Models\EncuestaEvaluadorAtributo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TablaEncuestasComponent extends Component
{
    public $searchObj = '';
    public $searchAtr = '';
    public $campoObj = null;
    public $campoAtr = null;
    public $orderObj = null;
    public $orderAtr = null;
    public $iconObj = '-circle';
    public $iconAtr = '-circle';
    public $inputEstatusObj = '';
    public $inputEstatusAtr = '';
    # evaluador carrera periodo
    public function render()
    {
        $user = Auth::user();
        $evaluadores = Evaluador::where('creadopor', $user->name)->get();

        $encuestasAtributos = db::table('encuesta_evaluador_atributos')
                                ->join('carreras', 'carreras.id', '=', 'idCarrera')
                                ->join('evaluadors', 'evaluadors.id', '=', 'evaluador')
                                ->join('residentes', 'residentes.id', '=', 'residente')
                                ->where('asignadoPor', $user->id)
                                ->select('encuesta_evaluador_atributos.*', 'carreras.carrera', 'evaluadors.nombres as evaluadorNombre', 'residentes.nombres', 'planEstudios');


        $encuestasObjetivos = db::table('encuesta_evaluador_objetivos')
                                ->join('carreras', 'carreras.id', '=', 'encuesta_evaluador_objetivos.idCarrera')
                                ->join('evaluadors', 'evaluadors.id', '=', 'encuesta_evaluador_objetivos.evaluador')
                                ->where('asignadoPor', $user->id)
                                ->select('encuesta_evaluador_objetivos.*', 'carreras.carrera', 'evaluadors.nombres', 'carreras.planEstudios');
                                
        if($this->campoObj && $this->orderObj){
            $encuestasObjetivos = $encuestasObjetivos->orderBy($this->campoObj, $this->orderObj);
        }else{
            $this->campo = null;
            $this->order = null;
        }
        
        if($this->campoAtr && $this->orderAtr){
            $encuestasAtributos = $encuestasAtributos->orderBy($this->campoAtr, $this->orderAtr);
        }else{
            $this->campoAtr = null;
            $this->orderAtr = null;
        }
        
        $encuestasObjetivos = $encuestasObjetivos->get();
        $encuestasAtributos = $encuestasAtributos->get();

        $encuestasObjetivos = $encuestasObjetivos->filter(function ($encuesta) {
            if(str_contains(strtolower($encuesta->nombres),strtolower($this->searchObj)) || str_contains(strtolower($encuesta->carrera), strtolower($this->searchObj)) || str_contains(strtolower($encuesta->periodo), strtolower($this->searchObj))){
                return true;
            } else{
                return false;
            }
        });
        
        $encuestasAtributos = $encuestasAtributos->filter(function ($encuesta) {
            if(str_contains(strtolower($encuesta->evaluadorNombre),strtolower($this->searchAtr)) || str_contains(strtolower($encuesta->carrera), strtolower($this->searchAtr)) || str_contains(strtolower($encuesta->periodo), strtolower($this->searchAtr)) || str_contains(strtolower($encuesta->nombres), strtolower($this->searchAtr))){
                return true;
            } else{
                return false;
            }
        });
        
        if($this->inputEstatusObj){
            $encuestasObjetivos = $encuestasObjetivos->filter(function ($encuesta) {
                if($encuesta->estatus == $this->inputEstatusObj){
                    return true;
                } else{
                    return false;
                }
            });
        }

        if($this->inputEstatusAtr){
            $encuestasAtributos = $encuestasAtributos->filter(function ($encuesta) {
                if($encuesta->estatus == $this->inputEstatusAtr){
                    return true;
                } else{
                    return false;
                }
            });
        }
        
        
        // $encuestasObjetivos = $encuestasObjetivos->get();


        if ($user->getRoleNames()[0] == "Administrador") {
            $carreras = Carrera::all();
        } else {
            $carreras = User::find($user->id)->carreras;   
        }

        

        return view('livewire.encuestas.tabla-encuestas-component', [
            'evaluadores' => $evaluadores,
            'carreras' => $carreras,
            'encuestasObjetivos' => $encuestasObjetivos,
            'encuestasAtributos' => $encuestasAtributos,
        ]);
    }

    // OBJETIVOS
    public function sortableObj ($campo){
        if($campo !== $this->campoObj){
            $this->orderObj = null;
        }

        switch($this->orderObj){
            case null:
                $this->orderObj = 'asc';
                break;
            case 'asc':
                $this->orderObj = 'desc';
                break;
            case 'desc':
                $this->orderObj = null;
                break;
        }

        $this->iconObj = $this->iconDirectionObj($this->orderObj);
        $this->campoObj = $campo;
        
    }

    public function iconDirectionObj ($sort): string{
        if(!$sort){
            return '-circle';
        }

        return $sort === 'asc' ? '-arrow-circle-up' : '-arrow-circle-down';
    }

    public function limpiarObj(){
        $this->orderObj = null;
        $this->campoObj = null;
        $this->iconObj = '-circle';
        $this->searchObj = '';
        $this->inputEstatusObj = '';
    }
    // ATRIBUTOS
    public function sortableAtr ($campo){
        if($campo !== $this->campoAtr){
            $this->orderAtr = null;
        }

        switch($this->orderAtr){
            case null:
                $this->orderAtr = 'asc';
                break;
            case 'asc':
                $this->orderAtr = 'desc';
                break;
            case 'desc':
                $this->orderAtr = null;
                break;
        }

        $this->iconAtr = $this->iconDirectionAtr($this->orderAtr);
        $this->campoAtr = $campo;
        
    }

    public function iconDirectionAtr ($sort): string{
        if(!$sort){
            return '-circle';
        }

        return $sort === 'asc' ? '-arrow-circle-up' : '-arrow-circle-down';
    }

    public function limpiarAtr(){
        $this->orderAtr = null;
        $this->campoAtr = null;
        $this->iconAtr = '-circle';
        $this->searchAtr = '';
        $this->inputEstatusAtr = '';
    }
}
