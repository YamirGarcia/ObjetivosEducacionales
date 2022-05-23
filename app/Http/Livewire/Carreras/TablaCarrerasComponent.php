<?php

namespace App\Http\Livewire\Carreras;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrera;
use App\Models\User;
use App\Models\UsuarioCarrera;
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

    public function render()
    {
        $user_session = Auth::user()->name;
        $user = Auth::user();

        if ($user->getRoleNames()[0] == "Administrador") {
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
        // $carreras = $carreras->filter(function($item){
        //     if($item->oculto == false){
        //         return true;
        //     }
        // });
        
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
        // $carreras = $carreras->get();
        // $carreras = $carreras->filter(function($item){
        //     if($item->oculto == true){
        //         return true;
        //     }
        // });

        // $usuarios = User::where('creadopor', $user->name)->get();
        // return view('livewire.carreras.tabla-carreras-component',[
        //     'carreras' => $carreras,
        //     'usuarios' => $usuarios,
        // ]);
    }

}
