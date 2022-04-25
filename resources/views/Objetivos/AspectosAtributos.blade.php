@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
    <link rel="stylesheet" type="text/css" href="/css/iconos.css">
    <link rel="stylesheet" type="text/css" href="/css/estiloFinalAspecto.css">
    <link rel="stylesheet" type="text/css" href="/css/estilosGenerales.css">
    @livewireStyles
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">
            <a style="text-decoration: none; color: #6c757d" href="/carreras">Carreras</a>
            <a style="text-decoration: none; color: #6c757d" href="{{route ('Atributos.show', $idAtributo)}}">/Atributo</a>
            <a style="text-decoration: none; color: #6c757d" href="{{route ('AspectosAtributos.show', $idAtributo)}}">/Aspectos</a>
        </h3>
    </div>
    {{-- <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">   
                    <div class="card-body">
                        <label for="">Agrega un nuevo aspecto:</label>
                        <div>
                            <form action="{{route ('AspectosAtributos.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-11">
                                        <input type="text" class="form-control" style="margin-right: 1rem;" name="nombre">
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-success btn-hg">Agregar</button>
                                    </div>
                                </div>
                                <input type="text" style="visibility: hidden;" value="{{$idAtributo}}" name="idAtributo">
                            </form>
                        </div>
                        @foreach ($envio as $aspecto)
                        <div class="accordion"  id="accordionExample{{$aspecto->id}}">
                            <div class="card" style="border: 1px solid black; margin-bottom: 0rem;">
                                <div class="card-header" id="heading{{$aspecto->id}}">
                                  <h2 class="mb-0" style="display: flex">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$aspecto->id}}" aria-expanded="true" aria-controls="collapse{{$aspecto->id}}" style="text-decoration: none">
                                        {{$loop->iteration}}.-  {{$aspecto->nombre}}
                                    </button>
                                    <div class="acciones">
                                        <a href="#" data-toggle="modal" data-target="#modalEditar{{$aspecto->id}}">
                                            <div class="icon edit-fill">
                                                <i>
                                                    <svg class="svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg>
                                                </i>
                                            </div>
                                        </a>
                                        <form action="{{route ('AspectosAtributos.destroy', [$aspecto->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" style="border: none; background: none">
                                                <div class="icon trash-fill">
                                                    <i>
                                                        <svg class="svg-delete" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/></svg>
                                                    </i>
                                                </div>
                                            </button>
                                            </form>
                                    </div>
                                  </h2>
                                </div>
                            
                                <div id="collapse{{$aspecto->id}}" class="collapse" aria-labelledby="heading{{$aspecto->id}}" data-parent="#accordionExample{{$aspecto->id}}">
                                  <div class="card-body">
                                      <table class="tabla-general">
                                        <thead>
                                            <tr class="table100-head">
                                                <th class="column1">No.</th>
                                                <th class="column2">Pregunta</th>
                                                <th class="column3">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      @foreach ($aspecto->preguntas as $pregunta)
                                            <tr class="table100-head">
                                                <td class="column1">{{$loop->iteration}}</td>
                                                <td class="column2">{{$pregunta->Pregunta}}</td>
                                                <td class="column3">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditar{{$pregunta->idAspectoObjetivo}}{{$pregunta->id}}" >Editar</button>
                                                   
                                            <form method="POST" action="{{url ('PreguntaAspectosAtributos/'.$pregunta->id)}}">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger btn-md">
                                            </form>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                      <h4>Agregar Nueva Pregunta:</h4>
                                    <form action="{{route ('PreguntaAspectosAtributos.store')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-11">
                                                <input type="text" class="form-control" style="margin-right: 1rem;" name="Pregunta">
                                            </div>
                                            <div class="col-1">
                                                <button type="submit" class="btn btn-success btn-hg">Agregar</button>
                                            </div>
                                        </div>
                                        <input type="text" style="visibility: hidden;" value="{{$aspecto->id}}" name="idAspectoAtributo">
                                         <input type="text" style="visibility: hidden;" value="{{$idAtributo}}" name="idAtributo"> 
                                    </form>
                                  </div>
                                </div>
                              </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div> --}}

        @livewire('atributos.aspectos-atributos-component', ['idAtributo' => $idAtributo])
    
    </section>

    {{-- MODAL EDITAR ASPECTO --}}
    
    @livewireScripts
@endsection
