@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
    <link rel="stylesheet" type="text/css" href="css/iconos.css">
    <link rel="stylesheet" type="text/css" href="css/estiloTablaEncuestas.css">
    <link rel="stylesheet" type="text/css" href="css/estiloAsignarEncuesta.css">
    <link rel="stylesheet" type="text/css" href="css/estilosBotones.css">
    @livewireStyles
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Encuestas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <div class="row">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @can('ver-encuestasObjetivos')
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home"
                                                type="button" role="tab" aria-controls="home" aria-selected="true">Objetivos
                                                Educacionales</button>
                                        </li>
                                    @endcan
                                    @can('ver-encuestasAtributos')
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-toggle="tab"
                                                data-target="#profile" type="button" role="tab" aria-controls="profile"
                                                aria-selected="false">Atributos</button>
                                        </li>
                                    @endcan
                                </ul>
                                {{-- ---------------------------------------------------------------------------------------------------------------------------------------------------- --}}
                                @livewire('encuestas.tabla-encuestas-component')
                                {{-- ---------------------------------------------------------------------------------------------------------------------------------------------------- --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @can('crear-encuestasObjetivos', 'crear-encuestasAtributos')
            <a href="#" class="btn-flotante" data-toggle="modal" data-target="#modalAgregar" style="z-index: 10000">Asignar
                Encuesta</a>
        @endcan

    </section>


    <div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Encuesta</h5>
                    <button class="btn-tabla" type="button" data-dismiss="modal">
                        <div class="icon trash-fill">
                          <i style="position: relative; top: 8px"> 
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
                          </i>
                      </div>
                      </button>
                </div>
                <form action="{{ route('crearEncuesta') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="col">
                            <div class="form-group">
                                <label for="carrera">Carrera</label>
                                <select name="carrera" id="carrera" class="form-select" required>
                                    <option selected="selected" disabled></option>
                                    @foreach ($carreras as $carrera)
                                        <option value="{{ $carrera->id }}">{{ $carrera->carrera }} {{$carrera->planEstudios}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tipo" class="form-label">Seleccione la opcion a evaluar:</label>
                                <select name="tipo" id="tipo" class="form-select" required>
                                    <option selected="selected" disabled></option>
                                    @can('crear-encuestasObjetivos')
                                        <option value="1">Objetivos Educacionales</option>
                                    @endcan
                                    @can('crear-encuestasAtributos')
                                        <option value="2">Atributos</option>
                                    @endcan
                                </select>
                            </div>
                        </div>

                        {{-- <input type="text" style="visibility: hidden;" value="{{$id}}" name="idObjetivo"> --}}
                    </div>

                    <div class="modal-footer">
                        <div class="col-xs-8 col-sm-12 col-md-15" style="left: -35px">
                            <button type="submit" class="boton-submit">Continuar</button>
                        </div>
                        {{-- <button type="submit" class="btn btn-primary">Prosigo</button> --}}
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        let mostrarObjetivos = document.querySelectorAll(".pestañaObjetivo");
        let mostrarAtributos = document.querySelectorAll(".pestañaAtributo");

        mostrarAtributos.forEach(mostrarAtributos => {
            mostrarAtributos.addEventListener('click', () => {
                mostrarAtributos.classList.toggle("activeAtributo");
                mostrarObjetivos.forEach(mostrarObjetivos => {
                    mostrarObjetivos.classList.remove("activeObjetivo");
                })
            })
        });
        mostrarObjetivos.forEach(mostrarObjetivos => {
            mostrarObjetivos.addEventListener('click', () => {
                mostrarObjetivos.classList.toggle("activeObjetivo");
                mostrarAtributos.forEach(mostrarAtributos => {
                    mostrarAtributos.classList.remove("activeAtributo");
                })
            })
        });
    </script>
    @livewireScripts
@endsection
