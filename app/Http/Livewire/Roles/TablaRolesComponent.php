<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class TablaRolesComponent extends Component
{
    public $search = '';
    public $campo = null;
    public $order = null;
    public $icon = '-circle';

    public function render()
    {
        $roles = Role::where('name', 'ilike', "%{$this->search}%");
        if($this->campo && $this->order){
            $roles = $roles->orderBy($this->campo, $this->order);
        }else{
            $this->campo = null;
            $this->order = null;
        }
        $roles = $roles->get();
        return view('livewire.roles.tabla-roles-component',[
            'roles' => $roles,
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
        $this->search='';
    }
}
