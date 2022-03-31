<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\User;
use App\Models\UsuarioCarrera;
use App\Models\Atributo;
use App\Models\ObjetivoEducacional;
use Illuminate\Support\Facades\Auth;

class CarreraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-carrera | crear-carrera | editar-carrera | borrar-carrera', ['only'=>['Objetivos.carrera']]);
        $this->middleware('permission:crear-carrera', ['only'=>['guardarCarrera']]);
        $this->middleware('permission:editar-carrera', ['only'=>['editarCarrera']]);
        $this->middleware('permission:borrar-carrera', ['only'=>['eliminarCarrera']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_session = Auth::user()->name;
        $carreras = Carrera::where('creadopor', $user_session)->paginate(5);
        $usuarios = User::where('creadopor', $user_session)->paginate();

        return view('Objetivos.carrera', ['carreras' => $carreras, 'usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_sesion = Auth::user()->name;
        $request->validate([
            'carrera' => 'required',
            'planEstudios' => 'required'
        ]);
        $carrera = new Carrera;
        $carrera->carrera = $request->carrera;
        $carrera->planEstudios = $request->planEstudios;
        $carrera->creadopor = $user_sesion;
        $carrera->save();


        return redirect()->route('carreras.index');
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
        //
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
        $request->validate([
            'carrera' => 'required',
            'planEstudios' => 'required'
        ]);
        $carrera = Carrera::find($id);
        $carrera->carrera = $request->carrera;
        $carrera->planEstudios = $request->planEstudios;
        $carrera->save();

        return redirect()->route('carreras.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function agregar_usuario(Request $request, $id){
        // dd([$request->carreraAtributo, $request->carrera]);
        
        if($request->carreraAtributo != 'Lista de Usuarios'){
            $usuarioCarrera = new UsuarioCarrera;
            $usuarioCarrera->user_id = $request->carreraAtributo;
            $usuarioCarrera->carrera_id = $request->carrera;
            $usuarioCarrera->save();
        }
        return redirect()->route('carreras.index');
    }
    
    public function eliminarAtributo(Request $request, $id){
        $atributo = Atributo::find($id);
        $atributo->delete();
        return redirect()->route('carreras.index');
    }

    public function eliminarObjetivo(Request $request, $id){
        $objetivo = ObjetivoEducacional::find($id);
        $objetivo->delete();
        return redirect()->route('carreras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera = Carrera::find($id);
        $carrera->delete();

        return redirect()->route('carreras.index');
    }
    }

