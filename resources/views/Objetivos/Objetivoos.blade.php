@extends('layouts.app')

@section('estilos')

<link rel="stylesheet" type="text/css" href="css/estiloAdicionalUsuario.css">
@endsection

@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Objetivos Educacionales</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div style="display: inline;">
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-striped mt-2 text-center">
                                <thead style="background-color: #6777ef">
                                    <tr>
                                        <th style="color: #fff;">Descripción</th>
                                        <th style="color: #fff;">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $envio as $objetivo)
                                    <tr>
                                        <td>{{$objetivo->descripcion}}</td>
                                        <td>
                                            <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalEditar{{$objetivo->id}}">Editar</button>
                                            <form method="POST" action="{{url ('ObjetivoEducacional/'.$objetivo->id)}}">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger btn-md">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn-flotante" data-toggle="modal" data-target="#modalAgregar">Agregar Objetivo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal para agregar objetivos -->
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AGREGAR OBJETIVO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url ('/ObjetivoEducacional', [])}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="carrera">Descripcion:</label>
                    <textarea type="text" row="5" class="form-control" name="descripcion" style="margin-bottom: 2rem;"></textarea>
                    <input type="text" class="form-control" name="idCarrera" style="margin-bottom: 2rem; visibility: hidden;" value={{$id}}></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar objetivos -->
@foreach( $envio as $objetivo)
<div class="modal fade" id="modalEditar{{$objetivo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ACCESO RAPIDO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url ('ObjetivoEducacional/'.$objetivo->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <label for="carrera">Descripcion:</label>
                    <textarea type="text" class="form-control" name="descripcion" style="margin-bottom: 2rem;">{{$objetivo->descripcion}}</textarea>
                    <input type="text" class="form-control" name="idCarrera" style="margin-bottom: 2rem; visibility: hidden;" value={{$id}}>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary">ACTUALIZAR INFORMACION</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


@endsection