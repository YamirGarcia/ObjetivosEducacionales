<?php

namespace App\Http\Livewire\Evaluadores;

use Livewire\Component;
use App\Models\GrupoDeInteres;
use App\Models\Evaluador;
use Illuminate\Support\Facades\Auth;

class TablaEvaluadoresComponent extends Component
{
    public $search = '';
    public $campo = null;
    public $order = null;
    public $icon = '-circle';

    public function render()
    {
        $grupo = GrupoDeInteres::all();
        $evaluadores = Evaluador::where('nombres','like',"%{$this->search}%")
                    ->orWhere('correo','like',"%{$this->search}%")
                    ->orWhere('empresa','like',"%{$this->search}%");
        if($this->campo && $this->order){
            $evaluadores = $evaluadores->orderBy($this->campo, $this->order);
        }else{
            $this->campo = null;
            $this->order = null;
        }
        $evaluadores = $evaluadores->get();
        return view('livewire.evaluadores.tabla-evaluadores-component',[
            'evaluadores' => $evaluadores,
            'user_sesion' => Auth::user()->name,
            
        ]);
    }
    public function prueba(){
        dd('here');
    }
    public function mount(){
        $this->icon = $this->iconDirection($this->order);
    }

    public function sortable($campo){
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

    public function clear () {
        $this->order = null;
        $this->campo = null;
        $this->icon = '-circle';
        $this->search = '';
    }
}
