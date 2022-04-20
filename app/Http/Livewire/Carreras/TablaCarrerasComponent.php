<?php

namespace App\Http\Livewire\Carreras;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrera;
use App\Models\User;

class TablaCarrerasComponent extends Component
{
    public $search = '';
    public $campo = null;
    public $order = null;
    public $icon = '-circle';

    public function render()
    {
        $user_session = Auth::user()->name;
        $user = Auth::user();

        if ($user->getRoleNames()[0] == "Administrador") {
            $carreras = Carrera::where('carrera', 'ilike', "%{$this->search}%")
            ->orWhere('planEstudios', 'ilike', "%{$this->search}%");
        } else {
            // $carreras = User::find($user->id)->carreras; 
            $carreras = User::where('id', $user->id)
                        ->orWhere('carrera', 'ilike', "%{$this->search}%")
                        ->orWhere('planEstudios', 'ilike', "%{$this->search}%");
        }

        if($this->campo && $this->order){
            $carreras = $carreras->orderBy($this->campo, $this->order);
        }else{
            $this->campo = null;
            $this->order = null;
        }

        $carreras = $carreras->get();
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
}
