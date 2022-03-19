<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;

class CarreraController extends Controller
{
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
