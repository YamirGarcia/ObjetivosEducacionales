<?php

namespace App\Http\Livewire\Residentes;

use Livewire\Component;
use App\Models\Residente;
class ResidentesComponent extends Component
{
    public $search = '';
    public $campo = null;
    public $order = null;
    public $icon = '-circle';
    protected $listeners = ['render', 'eliminarResidente'];
    public function render()
    {
        $residentes = null;
        if($this->campo && $this->order){
            $residentes = Residente::orderBy($this->campo, $this->order)->get();
        }else{
            $residentes = Residente::all();
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



        return view('livewire.residentes.residentes-component',[
            'residentes' => $residentes,
        ])->layout('Residentes.index');
    }

    public function limpiar (){
        $this->order = null;
        $this->campo = null;
        $this->icon = '-circle';
        $this->search = '';
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

    public function eliminarResidente ($id){
        // dd($id);
        Residente::destroy($id);
    }
}
