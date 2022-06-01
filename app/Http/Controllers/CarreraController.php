<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use App\Models\UsuarioCarrera;
use App\Models\User;
use App\Models\Atributo;
use App\Models\ObjetivoEducacional;
use App\Models\ObjetivoAspecto;
use Illuminate\Support\Facades\Auth;

class CarreraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-carrera | crear-carrera | editar-carrera | borrar-carrera', ['only'=>['Objetivos.carrera']]);
        $this->middleware('permission:crear-carrera', ['only'=>['store']]);
        $this->middleware('permission:editar-carrera', ['only'=>['update']]);
        $this->middleware('permission:borrar-carrera', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // protected $listeners = ['destroy'];
    public function index()
    {
        $user_session = Auth::user()->name;
        $user = Auth::user();
        $usuarios = null;
        if ($user->getRoleNames()[0] == "Administrador") {
            $carreras = Carrera::all();
            $usuarios = User::all();
        } else {
            $carreras = User::find($user->id)->carreras;   
            $usuarios = User::where('creadopor', $user->name)->get();
        }
        
        return view('Objetivos.carrera', ['carreras' => $carreras, 'usuarios' => $usuarios]);
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
        // $user_sesion = Auth::user()->name;
        $request->validate([
            'carrera' => 'required',
            'planEstudios' => 'required'
        ]);
        $carrera = new Carrera;
        $carrera->carrera = $request->carrera;
        $carrera->planEstudios = $request->planEstudios;
        $carrera->creadopor = Auth::user()->id;
        $carrera->save();

        $usuarioCarrera = new UsuarioCarrera;
        $usuarioCarrera->user_id = Auth::user()->id;
        $usuarioCarrera->carrera_id = $carrera->id;
        $usuarioCarrera->save();


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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function agregar_usuario(Request $request, $id){
        // dd([$request->carreraAtributo, $request->carrera]);
        
        if($request->carreraAtributo != 'Lista de Usuarios'){
            $usuarioCarrera = new UsuarioCarrera;
            $usuarioCarrera->user_id = $request->carreraAtributo;
            $usuarioCarrera->carrera_id = $request->carrera;
            $usuarioCarrera->save();
        }
        return redirect()->route('carreras.index');
    }
    
    public function eliminarAtributo(Request $request, $id){
        $atributo = Atributo::find($id);
        $atributo->delete();
        return redirect()->route('carreras.index');
    }

    public function eliminarObjetivo(Request $request, $id){
        $objetivo = ObjetivoEducacional::find($id);
        $objetivo->delete();
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

        if ($carrera->noBorrar == True) {
            // dd('no se puede borrar');
            $carrera->oculto = $carrera->oculto ? False : True ;
            $carrera->save();
        }else{
            $objetivos = $carrera->objetivos;
            foreach ($objetivos as $objetivo) {
                foreach ($objetivo->aspectos as $aspecto){
                    foreach($aspecto->preguntas as $pregunta){
                        $pregunta->delete();
                    }
                }
                $relacion = ObjetivoAspecto::where('objetivo_educacional_id', $objetivo->id)->get();
                $relacion->each->delete();
                $aspectos = $objetivo->aspectos;
                $aspectos->each->delete();
            }
    
            $relacionObj = ObjetivoEducacional::where('idCarrera', $id)->get();
            $relacionObj->each->delete();
    
            $relacionUserCarrera = UsuarioCarrera::where('carrera_id', $id)->get();
            $relacionUserCarrera->each->delete();
    
            $carrera->delete();
        }


        return redirect()->route('carreras.index');
    }

    public function eliminarUsuarioCarrera($idUsuario, $idCarrera){
        // dd($idUsuario, $idCarrera);
        
        $temp = UsuarioCarrera::where([
            ['user_id', $idUsuario],
            ['carrera_id', $idCarrera]
            ]
            )->get();
            // dd(Carrera::find($temp[0]->carrera_id), User::find($temp[0]->user_id));
            // dd($temp);
        $temp[0]->delete();
        return redirect()->route('carreras.index');
    }
}

