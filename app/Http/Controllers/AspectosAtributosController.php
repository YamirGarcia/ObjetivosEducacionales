<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AspectosAtributos;
use App\Models\Atributo;
use App\Models\AtributoAspecto;

class AspectosAtributosController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user_sesion = Auth::user()->name;
        // $this->validate($request,[
        //     'descripcionAspectoObjetivo' => 'required',
        // ]);
        
        $aspecto = new AspectosAtributos;
        $aspecto->nombre = $request->nombre;
        //$aspecto->idObjetivo = $request->idObjetivo;
        $aspecto->save();

        $relacion =  new AtributoAspecto;
        $relacion->atributo_id = $request->idAtributo;
        $relacion->aspectos_atributos_id = $aspecto->id;
        $relacion->save();

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
        $aspectos = Atributo::find($id)->aspectos;

        return view('Objetivos.AspectosAtributos', ['envio'=>$aspectos, 'idAtributo'=>$id]);
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
        $datosaspecto = request()->except('_token','_method','idAtributo');
        AspectosAtributos::where('id','=', $id )-> update($datosaspecto);
        $idAtributo = $request->idAtributo;

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
        $relacion = AtributoAspecto::where('aspectos_atributos_id',$id)->get();
        $temp = AtributoAspecto::where('aspectos_atributos_id',$id)->get();
        $temp = $temp[0]->atributo_id;
        $relacion->each->delete();

        $aspecto = AspectosAtributos::find($id);

        $aspecto->delete();

        return redirect()->route('AspectosAtributos.show', $temp);
    }
}
