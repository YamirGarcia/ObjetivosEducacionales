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
use App\Models\Evaluador;
use App\Models\GrupoDeInteres;


class EvaluadoresController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-evaluador | crear-evaluador | editar-evaluador | borrar-evaluador', ['only'=>['evaluadores.index']]);
        $this->middleware('permission:crear-evaluador', ['only'=>['create','store']]);
        $this->middleware('permission:editar-evaluador', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-evaluador', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['envio'] = GrupoDeInteres::paginate();
        $user_sesion = Auth::user()->name;
        $evaluadores = Evaluador::where('creadopor', $user_sesion)->paginate(10);
        return view('evaluadores.index', compact('evaluadores', 'user_sesion'), $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // $grupos = Role::create(['name' => 'Evaluador']);
        // $grupos = GrupoDeInteres::pluck('nombre','id')->all();
        $grupos = GrupoDeInteres::select('nombre','id')->get();
        return view('evaluadores.crear', compact('grupos'));
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
            'nombres' => 'required',
            'apellidos'=> 'required',
            'empresa'=> 'required',
            'idDepartamento'=> 'required',
            'idGrupoDeInteres'=> 'required',
            'correo' => 'required|email|unique:users,email',
            'contraseña' => 'required|same:confirm-password',
            'telefono' => 'required',
            'rol' => 'required',
            'creadopor' => 'required'
        ]);     
        $user = new User;
        $user->name = $request->nombres;
        $user->apellido = $request->apellidos;
        $user->email = $request->correo;
        $user->password= Hash::make($request->contraseña);;
        $user->telefono = $request->telefono;
        $user->creadopor = $request->creadopor;
        $user->rol = $request->rol;
        $user->assignRole($request->input('roles'));
        $user->save();
        
        $evaluador = new Evaluador;
        $evaluador->id = $user->id;
        $evaluador->nombres = $request->nombres;
        $evaluador->apellidos = $request->apellidos;
        $evaluador->empresa = $request->empresa;
        $evaluador->contraseña= $request->contraseña;
        $evaluador->correo = $request->correo;
        $evaluador->telefono = $request->telefono;
        $evaluador->idDepartamento = $request->idDepartamento;
        $evaluador->creadopor = $request->creadopor;
        $evaluador->idGrupoDeInteres = $request->idGrupoDeInteres;
        $evaluador->save();
        
        return redirect()->route('evaluadores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $grupos = GrupoDeInteres::pluck('nombre','id')->all();
        // return view('evaluadores.editar', compact('grupos'));
        
        $evaluador = Evaluador::find($id);
        $grupos = GrupoDeInteres::select('nombre','id')->get();
        // dd($grupos);
        $userGrupo = GrupoDeInteres::where('id',$evaluador->idGrupoDeInteres)->get();
        $idUserSession = User::where('email',$evaluador->correo)->get();
        // dd($idUserSession[0]->id);
        return view('evaluadores.editar', compact('evaluador','grupos','userGrupo','idUserSession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombres' => 'required',
            'apellidos'=> 'required',
            'empresa'=> 'required',
            'idDepartamento'=> 'required',
            'idGrupoDeInteres'=> 'required',
            'correo' => 'required|email|unique:evaluadors,correo,'.$id,
            'contraseña' => 'same:confirm-password',
            'telefono' => 'required',
            'rol' => 'required',
            'creadopor' => 'required',
            'idUserSession' => 'required'
        ]);
        $input = $request->all();
        if (!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }

        $evaluador = Evaluador::find($id);
        $evaluador->nombres = $request->nombres;
        $evaluador->apellidos = $request->apellidos;
        $evaluador->empresa = $request->empresa;
        $evaluador->correo = $request->correo;
        $evaluador->telefono = $request->telefono;
        $evaluador->idDepartamento = $request->idDepartamento;
        $evaluador->creadopor = $request->creadopor;
        $evaluador->idGrupoDeInteres = $request->idGrupoDeInteres;
        $evaluador->save();
        
        $user = User::find($request->idUserSession);
        $user->name = $request->nombres;
        $user->apellido = $request->apellidos;
        $user->email = $request->correo;
        if(!empty($input['password'])){
            $user->password= Hash::make($request->contraseña);;
        }
        $user->telefono = $request->telefono;
        $user->creadopor = $request->creadopor;
        $user->rol = $request->rol;

        DB::table('model_has_roles')->where('model_id', $request->idUserSession)->delete();
        $user->assignRole($request->input('roles'));
        $user->save();
        return redirect()->route('evaluadores.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

