<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjetivoEducacional;
use App\Models\AspectosObjetivos;
use App\Models\ObjetivoAspecto;

class AspectosController extends Controller
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
        // $user_sesion = Auth::user()->name;
        // $this->validate($request,[
        //     'descripcionAspectoObjetivo' => 'required',
        // ]);
        
        $aspecto = new AspectosObjetivos;
        $aspecto->nombre = $request->descripcionAspectoObjetivo;
        //$aspecto->idObjetivo = $request->idObjetivo;
        $aspecto->save();

        $relacion =  new ObjetivoAspecto;
        $relacion->objetivo_educacional_id = $request->idObjetivo;
        $relacion->aspectos_objetivos_id = $aspecto->id;
        $relacion->save();

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
        $aspectos = ObjetivoEducacional::find($id)->aspectos;

        return view('AspectosObjetivos.aspectos', ['aspectos'=>$aspectos, 'id'=>$id]);
        // return view('AspectosObjetivos.aspectos', $aspectos, compact('id'));
        // $datos['envio'] = AspectosObjetivos::where('idObjetivo','=', $id )->paginate();        
        // return view('Objetivos.Objetivos', $datos, compact('id'));

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
        $aspecto = AspectosObjetivos::find($id);
        $aspecto->nombre = $request->nombre;
        $aspecto->save();

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
        $relacion = ObjetivoAspecto::where('aspectos_objetivos_id',$id)->get();
        $temp = ObjetivoAspecto::where('aspectos_objetivos_id',$id)->get();
        $temp = $temp[0]->objetivo_educacional_id;
        $relacion->each->delete();

        $aspecto = AspectosObjetivos::find($id);

        $aspecto->delete();

        return redirect()->route('aspectosObjetivos.show', $temp);
    }
}
