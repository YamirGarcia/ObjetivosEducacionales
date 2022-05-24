<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class TablaRolesComponent extends Component
{
    public $search = '';
    public $campo = null;
    public $order = null;
    public $icon = '-circle';

    public $permisos = [
        1 => 'Ver Roles',
        2 => 'Crear Roles',
        3 => 'Editar Roles',
        4 => 'Borrar Roles',
        5 => 'Ver Carreras',
        6 => 'Crear Carreras',
        7 => 'Editar Carreras',
        8 => 'Borrar Carreras',
        9 => 'Ver Usuarios',
        10 => 'Crear Usuarios',
        11 => 'Editar Usuarios',
        12 => 'Borrar Usuarios',
        13 => 'Ver Objetivos',
        14 => 'Crear Objetivos',
        15 => 'Editar Objetivos',
        16 => 'Borrar Objetivos',
        17 => 'Ver Aspectos de Objetivos',
        18 => 'Crear Aspectos de Objetivos',
        19 => 'Editar Aspectos de Objetivos',
        20 => 'Borrar Aspectos de Objetivos',
        21 => 'Ver Preguntas de Objetivos',
        22 => 'Crear Preguntas de Objetivos',
        23 => 'Editar Preguntas de Objetivos',
        24 => 'Borrar Preguntas de Objetivos',
        25 => 'Ver Atributos',
        26 => 'Crear Atributos',
        27 => 'Editar Atributos',
        28 => 'Borrar Atributos',
        29 => 'Ver Aspectos de Atributos',
        30 => 'Crear Aspectos de Atributos',
        31 => 'Editar Aspectos de Atributos',
        32 => 'Borrar Aspectos de Atributos',
        33 => 'Ver Preguntas de Atributos',
        34 => 'Crear Preguntas de Atributos',
        35 => 'Editar Preguntas de Atributos',
        36 => 'Borrar Preguntas de Atributos',
        37 => 'Ver Evaluadores',
        38 => 'Crear Evaluadores',
        39 => 'Editar Evaluadores',
        40 => 'Borrar Evaluadores',
        41 => 'Visualizar Evaluadores',
        42 => 'Ver Encuestas de Objetivos',
        43 => 'Crear Encuestas de Objetivos',
        44 => 'Editar Encuestas de Objetivos',
        45 => 'Borrar Encuestas de Objetivos',
        46 => 'Ver Encuestas de Atributos',
        47 => 'Crear Encuestas de Atributos',
        48 => 'Editar Encuestas de Atributos',
        49 => 'Borrar Encuestas de Atributos',
        50 => 'Contestar Encuestas',
    ];
    public $permisosRol = null;

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

    public function mostrarPermisos($id){
        $rol = Role::where('id', '=', $id)->get();
        // dd($rol[0]);
        $permisosUsuario = DB::table('role_has_permissions')
                            ->where('role_has_permissions.role_id', $rol[0]->id)
                            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                            ->all();
        $this->permisosRol = $permisosUsuario;
    }
}
