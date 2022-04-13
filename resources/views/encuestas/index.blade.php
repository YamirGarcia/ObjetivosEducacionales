@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
<link rel="stylesheet" type="text/css" href="css/iconos.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Encuestas</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div style="display: inline;">
                    <div class="card-body">
                        <div class="row">
                        </div>
                        <a href="#" class="btn-flotante" data-toggle="modal" data-target="#modalAgregar">Asignar Encuesta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDITAR ASPECTO</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('crearEncuesta')}}" method="POST">
                @csrf
                <div class="modal-body">
  
                        <div class="col">
                            <div class="form-group">
                                <label for="carrera">Carrera</label>
                                <select name="carrera" id="carrera" class="form-select">
                                    <option selected="selected" disabled></option>
                                    @foreach ($carreras as $carrera)
                                        <option value="{{$carrera->id}}">{{$carrera->carrera}}</option>                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tipo" class="form-label">Seleccione la opcion a evaluar:</label>
                                <select name="tipo" id="tipo" class="form-select">
                                    <option selected="selected" disabled></option>
                                    <option value="1">Objetivos Educacionales</option>
                                    <option value="2">Atributos</option>
                                </select>
                            </div>
                        </div>

                    {{-- <input type="text" style="visibility: hidden;" value="{{$id}}" name="idObjetivo"> --}}
                </div>

                <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-primary">Prosigo</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection