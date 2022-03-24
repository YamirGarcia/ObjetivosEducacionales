<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;

class CarreraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-carrera | crear-carrera | editar-carrera | borrar-carrera', ['only'=>['Objetivos.carrera']]);
        $this->middleware('permission:crear-carrera', ['only'=>['guardarCarrera']]);
        $this->middleware('permission:editar-carrera', ['only'=>['editarCarrera']]);
        $this->middleware('permission:borrar-carrera', ['only'=>['eliminarCarrera']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::paginate(10);
        return view('Objetivos.carrera', ['carreras' => $carreras]);
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
        $request->validate([
            'carrera' => 'required',
            'planEstudios' => 'required'
        ]);
        $carrera = new Carrera;
        $carrera->carrera = $request->carrera;
        $carrera->planEstudios = $request->planEstudios;
        $carrera->save();


        return redirect()->route('carreras.index');
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
        $request->validate([
            'carrera' => 'required',
            'planEstudios' => 'required'
        ]);
        $carrera = Carrera::find($id);
        $carrera->carrera = $request->carrera;
        $carrera->planEstudios = $request->planEstudios;
        $carrera->save();

        return redirect()->route('carreras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carrera = Carrera::find($id);
        $carrera->delete();

        return redirect()->route('carreras.index');
    }
    }

