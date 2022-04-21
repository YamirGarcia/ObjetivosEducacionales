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
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home"
                                            type="button" role="tab" aria-controls="home" aria-selected="true">Objetivos
                                            Educacionales</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-toggle="tab"
                                            data-target="#profile" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Atributos</button>
                                    </li>
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

        <a href="#" class="btn-flotante" data-toggle="modal" data-target="#modalAgregar" style="z-index: 10000">Asignar
            Encuesta</a>

    </section>


    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background: transparent">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Encuesta</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('crearEncuesta') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="col">
                            <div class="form-group">
                                <label for="carrera">Carrera</label>
                                <select name="carrera" id="carrera" class="form-select">
                                    <option selected="selected" disabled></option>
                                    @foreach ($carreras as $carrera)
                                        <option value="{{ $carrera->id }}">{{ $carrera->carrera }}</option>
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
                        <button type="submit" class="learn-more">
                            <span class="circle" aria-hidden="true">
                                <span class="icon arrow"></span>
                            </span>
                            <span class="button-text">Continuar</span>
                        </button>
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
