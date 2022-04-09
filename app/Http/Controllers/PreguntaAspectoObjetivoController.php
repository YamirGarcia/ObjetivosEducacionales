<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjetivoEducacional;
use App\Models\AspectosObjetivos;
use App\Models\ObjetivoAspecto;
use App\Models\PreguntaAspectoObjetivo;

class PreguntaAspectoObjetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $pregunta = new PreguntaAspectoObjetivo;
        $pregunta->Pregunta = $request->Pregunta;
        $pregunta->idAspectoObjetivo = $request->idAspectoObjetivo;
        $pregunta->save();

        return redirect()->route('aspectosObjetivos.show',$request->idObjetivo);
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
        $pregunta = PreguntaAspectoObjetivo::find($id);
        $pregunta->Pregunta = $request->Pregunta;
        $pregunta->save();

        return redirect()->route('aspectosObjetivos.show',$request->idObjetivo);
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
