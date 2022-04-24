<?php

namespace App\Http\Livewire\Objetivos;

use Livewire\Component;
use App\Models\ObjetivoEducacional;
use App\Models\AspectosObjetivos;
use App\Models\ObjetivoAspecto;
use App\Models\PreguntaAspectoObjetivo;

class AspectosObjetivosComponent extends Component
{
    public $alumnos, $nombre, $carrera, $idAlumno;
    public $aspectos, $idObj;
    public $descripcionAspectoObjetivo, $idAspecto, $nuevaDescripcion;
    public $preguntaNueva, $idPregunta, $pregunta, $textoPregunta;
    public $cont, $array=[];

    protected $listeners = ['render', 'eliminarAspecto'];
    public function mount(){
        $this->cont = 1;
    }

    public function render()
    {
        $this->aspectos = ObjetivoEducacional::find($this->idObj)->aspectos;
        return view('livewire.objetivos.aspectos-objetivos-component');
    }

    public function guardarAspecto(){
        $messages = [
            'descripcionAspectoObjetivo.required' => 'Este campo no debe estar vacio.'
        ];
        $this->validate([
            'descripcionAspectoObjetivo' => 'required',
        ]);

        $aspecto = new AspectosObjetivos;
        $aspecto->nombre = $this->descripcionAspectoObjetivo;
        $aspecto->save();

        $relacion =  new ObjetivoAspecto;
        $relacion->objetivo_educacional_id = $this->idObj;
        $relacion->aspectos_objetivos_id = $aspecto->id;
        $relacion->save();
        $this->descripcionAspectoObjetivo = '';

        // session()->flash('message', 'Nuevo Aspecto Agregado');
        $this->success();
    }

    public function success(){
        $this->dispatchBrowserEvent('alert', ['message' => 'Usuario creado']);
    }

    public function prueba(){
        dd('here');
    }

    public function cargarDatosAspecto ($id){
        $this->idAspecto = $id;
        $aspec = AspectosObjetivos::find($id);
        $this->nuevaDescripcion = $aspec->nombre;
    }

    public function guardarDatosAspecto (){
        $aspec = AspectosObjetivos::find($this->idAspecto);
        $aspec->nombre = $this->nuevaDescripcion;
        $aspec->save();
        $this->nuevaDescripcion = '';
    }

    public function eliminarAspecto($id){
        $relacion = ObjetivoAspecto::where('aspectos_objetivos_id',$id)->get();
        $relacion->each->delete();

        $preguntas = PreguntaAspectoObjetivo::where('idAspectoObjetivo', $id)->get();
        $preguntas->each->delete();

        $aspecto = AspectosObjetivos::find($id);
        $aspecto->delete();
    }

    public function guardarPregunta($id){
        $preguntatemp = new PreguntaAspectoObjetivo;
        $preguntatemp->Pregunta = $this->preguntaNueva;
        $preguntatemp->idAspectoObjetivo = $id;
        $preguntatemp->save();
        $this->preguntaNueva = '';
    }

    public function borrarPregunta ($id){
        PreguntaAspectoObjetivo::find($id)->delete();
    }

    public function cargarDatosPregunta ($id){
        $this->idPregunta = $id;
        $pregunta = PreguntaAspectoObjetivo::find($id);
        $this->preguntaEditar = $pregunta->Pregunta;
        $this->textoPregunta = $pregunta->Pregunta;
    }

    public function guardarDatosPregunta (){
        $temp = PreguntaAspectoObjetivo::find($this->idPregunta);
        $temp->Pregunta = $this->preguntaEditar;
        $temp->save();
        $this->preguntaEditar = '';
    }
}
