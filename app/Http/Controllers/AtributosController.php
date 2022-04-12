<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atributo;
use App\Models\Carrera;



class AtributosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datos['envio'] = Atributo::paginate();
        return view('Objetivos.Atributos',$datos);
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
        Atributo::insert($datosObjetivo);
        return redirect('Atributos/'.$request->idCarrera);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $Atributos = Atributo::paginate();
        $datos['envio'] = Atributo::where('idCarrera','=', $id )->paginate();
        
        return view('Objetivos.Atributos', $datos, compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atributo=Atributo::findorFail($id);
        return redirect('Atributos', compact('atributo'));
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
        Atributo::where('id','=', $id )-> update($datosobjetivo);
    //return redirect()->route('Atributo', compact('id'));
       // return view('Atributos.Atributos');
        return redirect('Atributos/'.$request->idCarrera);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atributo=Atributo::findorFail($id);
        Atributo::destroy($id);
        //return redirect('Atributo');
        // return redirect('Atributo');
        return redirect('Atributos/'.$atributo->idCarrera);
    }
}