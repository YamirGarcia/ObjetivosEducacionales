<?php

namespace App\Http\Livewire\Atributos;

use Livewire\Component;
use App\Models\Atributo;
use App\Models\AspectosAtributos;
use App\Models\AtributoAspecto;
use App\Models\PreguntaAspectoAtributo;
class AspectosAtributosComponent extends Component
{
    public $aspectos = null, $idAtributo; 
    public $nuevoAspecto, $aspectoEditar = '', $idAspectoEditar;

    public $nuevaPregunta, $idPregunta, $preguntaEditar, $textoPregunta = 'ASDF';
    public $array = [];

    public function render()
    {   $this->aspectos = Atributo::find($this->idAtributo)->aspectos;
        return view('livewire.atributos.aspectos-atributos-component');
    }

    public function saludar  (){
        dd('Here');
    }

    public function crearAspecto (){
        $aspecto = new AspectosAtributos;
        $aspecto->nombre = $this->nuevoAspecto;
        $aspecto->save();

        $relacion = new AtributoAspecto;
        $relacion->atributo_id = $this->idAtributo;
        $relacion->aspectos_atributos_id = $aspecto->id;
        $relacion->save();

        $this->nuevoAspecto = '';
    }

    public function eliminarAspecto ($id){
        $relacion = AtributoAspecto::where('aspectos_atributos_id', $id);
        $relacion->delete();

        AspectosAtributos::destroy($id);
    }

    public function cargarAspecto ($id){
        $this->idAspectoEditar = $id;
        $this->aspectoEditar = AspectosAtributos::find($id)->nombre;
    }

    public function guardarDatosAspecto(){
        $temp = AspectosAtributos::find($this->idAspectoEditar);
        $temp->nombre = $this->aspectoEditar;
        $temp->save();
        $this->aspectoEditar = '';
    }

    public function crearPregunta($id){
        $pregunta = new PreguntaAspectoAtributo;
        $pregunta->Pregunta = $this->array[$id];
        $pregunta->idAspectoAtributo = $id;
        $pregunta->save();
        $this->array[$id] = '';
    }

    public function borrarPregunta ($id){
        PreguntaAspectoAtributo::destroy($id);
    }

    public function cargarPregunta ($id){
        $this->idPregunta = $id;
        $pregunta = PreguntaAspectoAtributo::find($id)->Pregunta;
        $this->textoPregunta = $pregunta;
        $this->preguntaEditar = $pregunta;
    } 

    public function guardarDatosPregunta (){
        $pregunta = PreguntaAspectoAtributo::find($this->idPregunta);
        $pregunta->Pregunta = $this->textoPregunta;
        $pregunta->save();
        $this->textoPregunta = '';
    }
}
