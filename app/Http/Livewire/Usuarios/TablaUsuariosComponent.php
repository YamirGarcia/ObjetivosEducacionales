<?php

namespace App\Http\Livewire\Usuarios;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class TablaUsuariosComponent extends Component
{
    use WithPagination;
    public $search = '';
    public $campo = null;
    public $order = null;
    public $icon = '-circle';
    public $rol = '';
    public $cont=0;
    public function render()
    {
        $user_sesion = Auth::user();

        $usuarios = User::where([
            ['creadopor', $user_sesion->name],
            ['rol', '!=', 'Evaluador']
            ]);
        


        if($this->campo && $this->order){
            $usuarios = $usuarios->orderBy($this->campo, $this->order);
        }else{
            $this->campo = null;
            $this->order = null;
        }

        $usuarios = $usuarios->get();     
        
        // FILTROS
        $usuarios = $usuarios->filter(function ($usuario) {
            if( str_contains(strtolower($usuario->rol),strtolower($this->rol)) ) return true;
        });

        $usuarios = $usuarios->filter(function ($usuario) {
            if( str_contains(strtolower($usuario->name),strtolower($this->search)) || str_contains(strtolower($usuario->email),strtolower($this->search)) ) return true;
        });

        return view('livewire.usuarios.tabla-usuarios-component', [
            'usuarios' => $usuarios,
            'user_sesion' => Auth::user()->name,
            'roles' => Role::pluck('name', 'name')->all(),
            'rolUsuario' => Auth::user()->rol,
        ]);
    }

    public function limpiar(){
        $this->order = null;
        $this->campo = null;
        $this->icon = '-circle';
        $this->search = '';
        $this->rol = '';
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
}
