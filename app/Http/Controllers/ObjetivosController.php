<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjetivoEducacional;
use App\Models\Carrera;

class ObjetivosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-objetivos', ['only'=>['show']]);
        $this->middleware('permission:crear-objetivos', ['only'=>['show', 'store']]);
        $this->middleware('permission:editar-objetivos', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-objetivos', ['only'=>['destroy']]);
    }
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
        $objetivo=ObjetivoEducacional::findorFail($id);
        ObjetivoEducacional::destroy($id);
        return redirect('ObjetivoEducacional/'.$objetivo->idCarrera);
    }
}
