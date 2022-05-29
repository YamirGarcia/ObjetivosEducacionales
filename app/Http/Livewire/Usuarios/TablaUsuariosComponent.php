<?php

namespace App\Http\Livewire\Usuarios;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TablaUsuariosComponent extends Component
{
    use WithPagination;
    public $search = '';
    public $campo = null;
    public $order = null;
    public $icon = '-circle';
    public $rol = '';
    public $cont=0;
    public $datosUsuario = [];
    public $temp = null;
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
        51 => 'Ver Residentes',
        52 => 'Crear Residentes',
        53 => 'Editar Residentes',
        54 => 'Borrar Residentes',
        55 => 'Ver Estadísticas',
    ];
    public $permisosRol = null;
    public function render()
    {
        $user_sesion = Auth::user();

        if($user_sesion->rol == 'Administrador'){
            
            if($this->campo && $this->order){
                $usuarios = User::orderBy($this->campo, $this->order)->get();
            }else{
                $usuarios = User::all();
                $this->campo = null;
                $this->order = null;
            }

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


        }else{
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
                // dd($usuarios);
                
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

    public function mostrarPermisos($idUsuario){
        $usuarioRol = User::find($idUsuario)->rol;
        $rol = Role::where('name', '=', $usuarioRol)->get();
        // dd($rol[0]);
        $permisosUsuario = DB::table('role_has_permissions')
                            ->where('role_has_permissions.role_id', $rol[0]->id)
                            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                            ->all();
        $this->permisosRol = $permisosUsuario;
    }

    public function cargarDatosCarreras($idUsuario){
        $this->temp = User::find($idUsuario);
    }

    public function cargarDatosPermisos($nombreRol){
        dd('Hola');
    }
}
