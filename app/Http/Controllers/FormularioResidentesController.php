<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residente;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FormularioResidentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Residentes.formulario');
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
        
        $this->validate($request, [
            'nombres' => 'required|max:30',
            'apellidos' => 'required|max:30',
            'numeroControl' => 'required',
            'correo' => 'required|email|unique:residentes,correo',
            'carrera' => 'required',
        ]);

        Residente::create([
            'nombres' => $request->nombres,
            'apellidos' =>$request->apellidos,
            'numeroControl' => $request->numeroControl,
            'correo' => $request->correo,
            'carrera' => $request->carrera,
        ]);

        return view('Residentes.formulario2');
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
        $user_session = Auth::user()->name;
        $residente = Residente::find($id);
        $residente->aceptado = true;
        $residente->asignadoPor = $user_session;
        $residente->save();
        return redirect()->route('residentes.index');
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
        //
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
