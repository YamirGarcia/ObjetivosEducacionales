<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrupoDeInteres;
class GrupoInteresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['envio'] = ObjetivoEducacional::paginate();
        return view('evaluadores.grupointeresModal',$datos);
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
        $datosGrupo = request()->except('_token');
        GrupoDeInteres::insert($datosGrupo);
        return redirect()->route('evaluadores.index');
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
        $grupo=GrupoDeInteres::findorFail($id);
        return redirect('GrupodeInteres', compact('grupo'));
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
        $datosGrupo = request()->except('_token','_method');
        GrupoDeInteres::where('id','=', $id )-> update($datosGrupo);
        return redirect()->route('evaluadores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        GrupoDeInteres::destroy($id);
        return redirect()->route('evaluadores.index');
    }
}
