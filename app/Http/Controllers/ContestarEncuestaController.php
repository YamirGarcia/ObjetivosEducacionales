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
use App\Models\RespuestaObjetivo;
use App\Models\RespuestaAtributo;

use Illuminate\Support\Facades\Auth;

class ContestarEncuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_session = Auth::user(); 
        $encuestaObjetivo = EncuestaEvaluadorObjetivo::where('evaluador',$user_session->id)->get();
        $encuestaAtributo = EncuestaEvaluadorAtributo::where('evaluador',$user_session->id)->get();
        return view('ContestarEncuesta.index', compact('encuestaObjetivo', 'encuestaAtributo'));
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
        $cont = 0;
        $idPregunta = array_keys($request->pregunta);
        foreach ($request->pregunta as $respuesta) {
            $respuestaObjetivo = new RespuestaObjetivo();
            $respuestaObjetivo->idPreguntaAspecto = $idPregunta[$cont];
            $cont = $cont + 1;

            $respuestaObjetivo->respuesta = $respuesta;
            $respuestaObjetivo->idEncuestaAsignada = $request->idEncuestaAsignada;
            $respuestaObjetivo->save();
        }
        $encuesta = EncuestaEvaluadorObjetivo::find($request->idEncuestaAsignada);
        $encuesta->estatus = 'contestada';
        $encuesta->save();

        return redirect()->route('contestarEncuestas.index');
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
        $encuesta = EncuestaEvaluadorObjetivo::find($id);
        $encuesta->estatus = 'recibida';
        $encuesta->save();

        $encuestaObjetivo = EncuestaObjetivo::where('idEncuestaAsignada',$id)->get();
        return view('ContestarEncuesta.contestar', compact('encuestaObjetivo','id'));
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
