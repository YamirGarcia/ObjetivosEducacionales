<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residente;

class ResidentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Residentes.index', compact('residentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Residentes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'nombres' => 'required',
            'apellidos' => 'required',
            'numeroControl' => 'required',
            'correo' => 'required',
            'carrera' => 'required',
        ]);

        // $residente = new Residente();
        // $residente -> nombres = $request -> nombre;
        // $residente -> apellidos= $request -> nombre;
        // $residente -> numeroControl = $request -> nombre;
        // $residente -> nombre = $request -> nombre;
        // $residente -> nombre = $request -> nombre;
        // $residente->save();

        Residente::create([
            'nombres' => $request->nombres,
            'apellidos' =>$request->apellidos,
            'numeroControl' => $request->numeroControl,
            'correo' => $request->correo,
            'carrera' => $request->carrera,
        ]);

        return redirect()->route('residentes.index');
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
        $residente = Residente::find($id);
        // dd($idUserSession[0]->id);
        return view('Residentes.editar', compact('residente'));
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
        $this->validate($request, [
            'nombre' => 'required',
        ]);

        $evaluador = Residente::find($id);
        $evaluador->nombre = $request->nombre;
        $evaluador->save();
        return redirect()->route('residentes.index');
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
