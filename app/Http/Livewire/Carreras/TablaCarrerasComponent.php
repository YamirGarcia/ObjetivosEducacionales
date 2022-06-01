<?php

namespace App\Http\Livewire\Carreras;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrera;
use App\Models\User;
use App\Models\UsuarioCarrera;
use App\Models\ObjetivoEducacional;
use Illuminate\Support\Facades\DB;


class TablaCarrerasComponent extends Component
{
    public $search = '';
    public $campo = null;
    public $order = null;
    public $icon = '-circle';
    public $band = true;
    public $cont = 0;
    public $botonMostrar = true;
    protected $listeners = ['eliminarCarrera'];

    public function render()
    {
        $user_session = Auth::user()->name;
        $user = Auth::user();

        if ($user->rol == "Administrador") {
            $carreras = Carrera::where('carrera', 'ilike', "%{$this->search}%")
            ->orWhere('planEstudios', 'ilike', "%{$this->search}%");
            $this->band = true;
        } else {
            
            $carreras = db::table('usuario_carreras')
                        ->join('users', 'users.id', '=', 'usuario_carreras.user_id')
                        ->join('carreras', 'carreras.id', '=', 'usuario_carreras.carrera_id')
                        ->where('user_id','=', $user->id);
                        
            if($this->campo && $this->order){
            $carreras = $carreras->orderBy($this->campo, $this->order);
            }else{
                $this->campo = null;
                $this->order = null;
            }     
            
            $carreras = $carreras->get();
            $this->band = false;
            $carreras = $carreras->filter(function ($value){
                if(str_contains(strtolower($value->carrera),strtolower($this->search)) || str_contains(strtolower($value->planEstudios), strtolower($this->search))){
                    return true;
                } else{
                    return false;
                }
            });
            $usuarios = User::where('creadopor', $user->name)->get();
            if($this->botonMostrar == true){
            $carreras = $carreras->filter(function($item){
                if($item->oculto == false){
                    return true;
                }
            });
        }
            return view('livewire.carreras.tabla-carreras-component',[
            'carreras' => $carreras,
            'usuarios' => $usuarios,
            ]);
        }

        if($this->campo && $this->order){
            $carreras = $carreras->orderBy($this->campo, $this->order);
        }else{
            $this->campo = null;
            $this->order = null;
        }

        $carreras = $carreras->get();
        if($this->botonMostrar == true){
            $carreras = $carreras->filter(function($item){
                if($item->oculto == false){
                    return true;
                }
            });
        }
        
        $usuarios = User::where('creadopor', $user->name)->get();
        return view('livewire.carreras.tabla-carreras-component',[
            'carreras' => $carreras,
            'usuarios' => $usuarios,
        ]);
    }

    public function sortable ($campo){
        if($campo !== $this->campo){
            $this->order = null;
        }

        switch($this->order){
            case null:
                $this->order = 'asc';
                break;
            case 'asc':
                $this->order = 'desc';
                break;
            case 'desc':
                $this->order = null;
                break;
        }

        $this->icon = $this->iconDirection($this->order);
        $this->campo = $campo;
        
    }

    public function iconDirection ($sort): string{
        if(!$sort){
            return '-circle';
        }

        return $sort === 'asc' ? '-arrow-circle-up' : '-arrow-circle-down';
    }

    public function limpiar(){
        $this->order = null;
        $this->campo = null;
        $this->icon = '-circle';
        $this->search = '';
    }

    public function mostrarOcultos(){
        if($this->botonMostrar){
            $this->botonMostrar = false;
        }else{
            $this->botonMostrar = true;
        }
    }

    public function eliminarCarrera($id) {
        $carrera = Carrera::find($id);

        if ($carrera->noBorrar == True) {
            $carrera->oculto = $carrera->oculto ? False : True ;
            $carrera->save();
        }else{
            $objetivos = $carrera->objetivos;
            foreach ($objetivos as $objetivo) {
                foreach ($objetivo->aspectos as $aspecto){
                    foreach($aspecto->preguntas as $pregunta){
                        $pregunta->delete();
                    }
                }
                $relacion = ObjetivoAspecto::where('objetivo_educacional_id', $objetivo->id)->get();
                $relacion->each->delete();
                $aspectos = $objetivo->aspectos;
                $aspectos->each->delete();
            }
    
            $relacionObj = ObjetivoEducacional::where('idCarrera', $id)->get();
            $relacionObj->each->delete();
    
            $relacionUserCarrera = UsuarioCarrera::where('carrera_id', $id)->get();
            $relacionUserCarrera->each->delete();
    
            $carrera->delete();
        }
    }

}
