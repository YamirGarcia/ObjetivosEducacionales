<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public $carrerasUsuario;
    // protected $listeners = [
    //     'cargarCarrerasUsuario'
    // ];
    function __construct()
    {
        $this->middleware('permission:ver-usuario | crear-usuario | editar-usuario | borrar-usuario', ['only'=>['usuarios.index']]);
        $this->middleware('permission:crear-usuario', ['only'=>['create','store']]);
        $this->middleware('permission:editar-usuario', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-usuario', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_sesion = Auth::user()->name;
        
        $usuarios = User::where([
            ['creadopor', $user_sesion],
            ['rol', '!=', 'Evaluador']
            ])->paginate(10);

        return view('usuarios.index', compact('usuarios','user_sesion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $roles = array_filter($roles, function ($key){
            if($key == 'Evaluador') {return false;}
            else {
                return true;
            }
        });

        if(Auth::user()->rol != 'Administrador'){
            unset($roles['Administrador']);
        }
        return view('usuarios.crear', compact('roles'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        // dd(gettype( $roles));
        $roles = array_filter($roles, function ($key){
            if($key == 'Evaluador') {return false;}
            else {return true;}
        });
        if(Auth::user()->rol != 'Administrador'){
            unset($roles['Administrador']);
        }
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view('usuarios.editar', compact('user', 'roles', 'userRole'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'apellido'=> 'required|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'telefono' => 'required|max:10',
            'rol' => 'required',
            'creadopor' => 'required'
        ]);

        $input = $request->all();        
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('rol'));

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'apellido'=> 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'telefono' => 'required',
            'rol' => 'required'
        ]);   
        $input = $request->all();
        if (!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('rol'));
        $user->save();
        // dd($user->rol);
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }


    public function cambiar(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'same:confirm-password'
        ]);   
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::find($id);
        $user->update($input);
        return redirect()->route('home');
    }

}

