@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="css/estiloAdicionalRol.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">ASSPECTOS</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">   
                    <div class="card-body">
                        <label for="">Agrega un nuevo aspecto:</label>
                        <div>
                            <form action="{{route ('aspectosObjetivos.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-11">
                                        <input type="text" class="form-control" style="margin-right: 1rem;" name="descripcionAspectoObjetivo">
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-success btn-hg">Agregar</button>
                                    </div>
                                </div>
                                <input type="text" style="visibility: hidden;" value="{{$id}}" name="idObjetivo">
                            </form>
                        </div>
                        @foreach ($aspectos as $aspecto)
                        <div class="accordion"  id="accordionExample{{$aspecto->id}}">
                            <div class="card" style="border: 1px solid black; margin-bottom: 0rem;">
                                <div class="card-header" id="heading{{$aspecto->id}}">
                                  <h2 class="mb-0" style="display: flex">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$aspecto->id}}" aria-expanded="true" aria-controls="collapse{{$aspecto->id}}" style="text-decoration: none">
                                        {{$loop->iteration}}.-  {{$aspecto->nombre}}
                                    </button>

                                    <button class="btn btn-primary" style="position:absolute; right:10%;">Editar</button>
                                    <form action="{{route ('aspectosObjetivos.destroy', [$aspecto->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" style="position:absolute; right:2%;">Borrar</button>
                                    </form>
                                  </h2>
                                </div>
                            
                                <div id="collapse{{$aspecto->id}}" class="collapse" aria-labelledby="heading{{$aspecto->id}}" data-parent="#accordionExample{{$aspecto->id}}">
                                  <div class="card-body">
                                    {{$aspecto->nombre}}
                                  </div>
                                </div>
                              </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection