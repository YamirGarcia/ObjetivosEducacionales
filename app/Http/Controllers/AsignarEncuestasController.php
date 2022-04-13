<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluador;
use App\Models\Carrera;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AsignarEncuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_session = Auth::user()->name;
        $user = Auth::user();
        $evaluadores = Evaluador::where('creadopor', $user_session)->get();

        if ($user->getRoleNames()[0] == "Administrador") {
            $carreras = Carrera::all();
        } else {
            $carreras = User::find($user->id)->carreras;   
        }
        return view('encuestas.index', compact('evaluadores', 'carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_session = Auth::user()->name;
        $user = Auth::user();
        $evaluadores = Evaluador::where('creadopor', $user_session)->get();

        if ($user->getRoleNames()[0] == "Administrador") {
            $carreras = Carrera::all();
        } else {
            $carreras = User::find($user->id)->carreras;   
        }
        return view('encuestas.crear', compact('evaluadores', 'carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        //
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

    public function crearEncuesta(Request $request){
        $user_session = Auth::user()->name;
        $evaluadores = Evaluador::where('creadopor', $user_session)->get();

        $carrera = $request->carrera; 
        $tipoEncuesta = $request->tipo;
        
        if($tipoEncuesta == '1'){
            $encuestas = Carrera::find($carrera)->objetivos;
        }else{
            $encuestas = Carrera::find($carrera)->atributos;
        }
        return view('encuestas.crear', compact('carrera', 'encuestas', 'evaluadores', 'tipoEncuesta'));
    }
}
