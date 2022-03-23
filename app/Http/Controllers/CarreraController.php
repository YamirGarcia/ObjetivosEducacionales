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

    public function verCarreras(Request $request){
        $carreras = Carrera::all();
        return view('Objetivos.carrera', ['carreras' => $carreras]);
    }

    public function guardarCarrera(Request $request){
        $request->validate([
            'carrera' => 'required',
            'planEstudios' => 'required'
        ]);
        $carrera = new Carrera;
        $carrera->carrera = $request->carrera;
        $carrera->planEstudios = $request->planEstudios;
        $carrera->save();

        return redirect()->route('carrera')->with('success','Carrera agregada correctamente');
    }

    public function editarCarrera(Request $request, $id){
        $request->validate([
            'carrera' => 'required',
            'planEstudios' => 'required'
        ]);
        $carrera = Carrera::find($id);
        $carrera->carrera = $request->carrera;
        $carrera->planEstudios = $request->planEstudios;
        $carrera->save();

        return redirect()->route('carrera')->with('success','Carrera actualizada correctamente');
    }

    public function eliminarCarrera($id){
        $carrera = Carrera::find($id);
        $carrera->delete();

        return redirect()->route('carrera')->with('success','Carrera agregada correctamente');
    }
}
