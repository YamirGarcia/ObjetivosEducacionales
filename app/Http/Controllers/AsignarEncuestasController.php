<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluador;
use App\Models\Carrera;
use App\Models\User;
use App\Models\EncuestaEvaluadorObjetivo;
use App\Models\EncuestaEvaluadorAtributo;
use App\Models\EncuestaObjetivo;
use App\Models\EncuestaAtributo;
use App\Models\Residente;

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
        $encuestasObjetivos = EncuestaEvaluadorObjetivo::where('asignadoPor', $user->id)->get();
        $encuestasAtributos = EncuestaEvaluadorAtributo::where('asignadoPor', $user->id)->get();

        if ($user->getRoleNames()[0] == "Administrador") {
            $carreras = Carrera::all();
        } else {
            $carreras = User::find($user->id)->carreras;   
        }
        return view('encuestas.index', compact('evaluadores', 'carreras', 'encuestasObjetivos', 'encuestasAtributos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'encuestaAspectos[]' => 'required'
        // ]);
        
        // dd($request->encuestaAspectos);

        $user_session = Auth::user()->id;
        if($request->tipoEncuesta == 1){
            $encuestaAsignada =  new EncuestaEvaluadorObjetivo;
            $encuestaAsignada->estatus = "enviada";
            $encuestaAsignada->evaluador = $request->evaluador;
            $encuestaAsignada->periodo = $request->periodo;
            $encuestaAsignada->asignadoPor = $user_session;
            $encuestaAsignada->idCarrera = $request->idCarrera;
            $encuestaAsignada->save();

            foreach ($request->encuestaAspectos as $encuestaAspecto) {
                $aspectosAsignados = new EncuestaObjetivo;
                $aspectosAsignados->idEncuestaAsignada = $encuestaAsignada->id;
                $aspectosAsignados->idAspectoObjetivo = $encuestaAspecto;
                $aspectosAsignados->save();
            }

            $carrera = Carrera::find($request->idCarrera);
            $carrera->noBorrar = True;
            $carrera->save();

        }else{
            $encuestaAsignada =  new EncuestaEvaluadorAtributo;
            $encuestaAsignada->estatus = "enviada";
            $encuestaAsignada->evaluador = $request->evaluador;
            $encuestaAsignada->periodo = $request->periodo;
            $encuestaAsignada->asignadoPor = $user_session;
            $encuestaAsignada->idCarrera = $request->idCarrera;
            $encuestaAsignada->residente = $request->residente;
            $encuestaAsignada->save();

            foreach ($request->encuestaAspectos as $encuestaAspecto) {
                $aspectosAsignados = new EncuestaAtributo;
                $aspectosAsignados->idEncuestaAsignada = $encuestaAsignada->id;
                $aspectosAsignados->idAspectoAtributo = $encuestaAspecto;
                $aspectosAsignados->save();
            }
            $carrera = Carrera::find($request->idCarrera);
            $carrera->noBorrar = True;
            $carrera->save();
        };
        return redirect()->route('encuestas.index');
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
            return view('encuestas.crear', compact('carrera', 'encuestas', 'evaluadores', 'tipoEncuesta'));
        }else{
            $residentes = Residente::all();
            $encuestas = Carrera::find($carrera)->atributos;
            return view('encuestas.crearAtributo', compact('carrera', 'encuestas', 'evaluadores', 'tipoEncuesta', 'residentes'));
        }
    }

    public function verRespuestas(Request $request){
        if ($request->tipoEncuesta == 1) {
            $encuestaObjetivo = EncuestaEvaluadorObjetivo::find($request->idEncuestaAsignada);
            return view('encuestas.verRespuesta', compact('encuestaObjetivo'));
            
        }else{
            $encuestaAtributo = EncuestaEvaluadorAtributo::find($request->idEncuestaAsignada);
            return view('encuestas.verRespuestaAtributo', compact('encuestaAtributo'));
        }
    }
}
