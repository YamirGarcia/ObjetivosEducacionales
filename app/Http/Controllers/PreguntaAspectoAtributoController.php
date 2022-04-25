<?php

namespace App\Http\Controllers;
use App\Models\PreguntaAspectoAtributo;
use App\Models\AspectosAtributos;
use App\Models\Atributo;
use App\Models\AtributoAspecto;

use Illuminate\Http\Request;

class PreguntaAspectoAtributoController extends Controller
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
        $datospregunta = request()->except('_token','idAtributo');
        PreguntaAspectoAtributo::insert($datospregunta);
        return redirect()->route('AspectosAtributos.show',$request->idAtributo);
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
        $datospregunta = request()->except('_token','_method','idAtributo');
        PreguntaAspectoAtributo::where('id','=', $id )-> update($datospregunta);
        return redirect()->route('AspectosAtributos.show',$request->idAtributo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $pregunta = PreguntaAspectoAtributo::findorFail($id);
        $relacion = AtributoAspecto::where('aspectos_atributos_id','=',$pregunta->idAspectoAtributo);
        PreguntaAspectoAtributo::destroy($id);
        return redirect()->route('AspectosAtributos.show',1);
    }
}
