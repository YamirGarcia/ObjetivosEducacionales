<?php

namespace App\Http\Livewire\Residentes;

use Livewire\Component;
use App\Models\Residente;
use Illuminate\Support\Facades\Auth;
class ResidentesComponent extends Component
{
    public $search = '';
    public $searchPen = '';
    public $campo = null;
    public $campoPen = null;
    public $order = null;
    public $orderPen = null;
    public $icon = '-circle';
    public $iconPen = '-circle';
    public $inputCarrera = '';
    public $inputCarreraPen = '';
    protected $listeners = ['render', 'eliminarResidente'];
    public function render()
    {
        $residentes2=null;
        $residentes = null;
        if($this->campo && $this->order){
            $residentes = Residente::orderBy($this->campo, $this->order)->get();
        }else{
            $residentes = Residente::all();
        }

        if($this->campoPen && $this->orderPen){
            $residentes2 = Residente::where('aceptado', false)->orderBy($this->campoPen, $this->orderPen)->get();
        }else{
            $residentes2 = Residente::where('aceptado', false)->get();
        }

        $residentes = $residentes->filter(function ($value) {
            if(
                str_contains(strtolower($value->nombres), strtolower($this->search))  
            || str_contains(strtolower($value->apellidos), strtolower($this->search)) 
            || str_contains(strtolower($value->numeroControl), strtolower($this->search))
            || str_contains(strtolower($value->correo), strtolower($this->search))
            || str_contains(strtolower($value->carrera), strtolower($this->search))
            ) return true;
            else false;
        });

        $residente2 = $residentes2->filter(function ($value) {
            if(
                str_contains(strtolower($value->nombres), strtolower($this->searchPen))  
            || str_contains(strtolower($value->apellidos), strtolower($this->searchPen)) 
            || str_contains(strtolower($value->numeroControl), strtolower($this->searchPen))
            || str_contains(strtolower($value->correo), strtolower($this->searchPen))
            || str_contains(strtolower($value->carrera), strtolower($this->searchPen))
            ) return true;
            else false;
        });

        $user_session = Auth::user()->name;

        if($this->inputCarrera){
            $residentes = $residentes->filter(function ($value) {
                if($value->carrera == $this->inputCarrera){
                    return true;
                } else{
                    return false;
                }
            });
        }

        if($this->inputCarreraPen){
            $residentes2 = $residentes2->filter(function ($value) {
                if($value->carrera == $this->inputCarreraPen){
                    return true;
                } else{
                    return false;
                }
            });
        }

        return view('livewire.residentes.residentes-component',[
            'residentes' => $residentes,
            'residentes2' => $residentes2,
            'user_session' => $user_session,
        ])->layout('Residentes.index');

        
    }

    public function limpiar (){
        $this->order = null;
        $this->campo = null;
        $this->icon = '-circle';
        $this->search = '';
        $this->inputCarrera = '';
    }

    public function limpiarPen (){
        $this->orderPen = null;
        $this->campoPen = null;
        $this->iconPen = '-circle';
        $this->searchPen = '';
        $this->inputCarreraPen = '';
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

    public function sortablePen ($campoPen){
        if($campoPen !== $this->campoPen){
            $this->orderPen = null;
        }

        switch($this->orderPen){
            case null:
                $this->orderPen = 'asc';
                break;
            case 'asc':
                $this->orderPen = 'desc';
                break;
            case 'desc':
                $this->orderPen = null;
                break;
        }

        $this->iconPen = $this->iconDirectionPen($this->orderPen);
        $this->campoPen = $campoPen;
        
    }

    public function iconDirectionPen ($sort): string{
        if(!$sort){
            return '-circle';
        }
        return $sort === 'asc' ? '-arrow-circle-up' : '-arrow-circle-down';
    }

  

    public function eliminarResidente ($id){
        // dd($id);
        Residente::destroy($id);
    }

    
}
