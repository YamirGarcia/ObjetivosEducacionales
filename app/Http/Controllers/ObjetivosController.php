<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjetivoEducacional;
use App\Models\Carrera;



class ObjetivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datos['envio'] = ObjetivoEducacional::paginate();
        return view('Objetivos.Objetivos',$datos);
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
        $datosObjetivo = request()->except('_token');
        ObjetivoEducacional::insert($datosObjetivo);
        return redirect('ObjetivoEducacional/'.$request->idCarrera);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $objetivos = ObjetivoEducacional::paginate();
        $datos['envio'] = ObjetivoEducacional::where('idCarrera','=', $id )->paginate();
        
        return view('Objetivos.Objetivos', $datos, compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objetivo=ObjetivoEducacional::findorFail($id);
        return redirect('ObjetivoEducacional', compact('objetivo'));
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
        $datosobjetivo = request()->except('_token','_method');
        ObjetivoEducacional::where('id','=', $id )-> update($datosobjetivo);
    //return redirect()->route('ObjetivoEducacional', compact('id'));
       // return view('Objetivos.Objetivos');
        return redirect('ObjetivoEducacional/'.$request->idCarrera);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idcarrera = ObjetivoEducacional::where('id','=', $id );
        ObjetivoEducacional::destroy($id);
        //return redirect('ObjetivoEducacional');
        // return redirect('ObjetivoEducacional');
        return redirect('ObjetivoEducacional/'.$idcarrera->idCarrera);
    }
}
