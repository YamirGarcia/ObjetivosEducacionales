@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
    <link rel="stylesheet" type="text/css" href="/css/estiloResponderEncuestas.css">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Contestar Encuestas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow p-3 mb-5 bg-body rounded"
                        style="width: 700px; margin-left: auto; margin-right: auto;">
                        <div class="card-body">
                            <div class="row">
                                <h2>Información</h2>
                                <h5>Gracias por realizar esta encuesta, por favor conteste de la manera más objetiva</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow p-3 mb-5 bg-body rounded "
                        style="width: 700px; margin-left: auto; margin-right: auto; position:sticky; top: 70px; z-index: 4000; margin-top: auto; margin-bottom: auto;">
                        <div class="card-body">
                            <div class="row" style="text-align: center; ">
                                <label for="" style="width: 19%">

                                    <svg style="fill: rgb(0, 109, 217);" class="iconoRespuesta" viewBox="0 0 24 24">
                                        <path
                                            d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                    </svg>
                                </label>
                                <label for="" style="width: 19%">
                                    <svg style="fill: rgb(0, 204, 79);" class="iconoRespuesta" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" />
                                    </svg>
                                </label>
                                <label for="" style="width: 19%">
                                    <svg style="fill: rgb(232, 214, 0);" class="iconoRespuesta" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M8.5,11A1.5,1.5 0 0,1 7,9.5A1.5,1.5 0 0,1 8.5,8A1.5,1.5 0 0,1 10,9.5A1.5,1.5 0 0,1 8.5,11M15.5,11A1.5,1.5 0 0,1 14,9.5A1.5,1.5 0 0,1 15.5,8A1.5,1.5 0 0,1 17,9.5A1.5,1.5 0 0,1 15.5,11M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M9,14H15A1,1 0 0,1 16,15A1,1 0 0,1 15,16H9A1,1 0 0,1 8,15A1,1 0 0,1 9,14Z" />
                                    </svg>
                                </label>
                                <label for="" style="width: 19%">
                                    <svg style="fill: rgb(229, 132, 0);" class="iconoRespuesta" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M12,14C13.75,14 15.29,14.72 16.19,15.81L14.77,17.23C14.32,16.5 13.25,16 12,16C10.75,16 9.68,16.5 9.23,17.23L7.81,15.81C8.71,14.72 10.25,14 12,14Z" />
                                    </svg>
                                </label>
                                <label for="" style="width: 19%">
                                    <svg style="fill: rgb(239, 42, 16);" class="iconoRespuesta" viewBox="0 0 24 24">
                                        <path
                                            d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" />
                                    </svg>
                                </label>
                            </div>
                            <div class="row" style="text-align: center; position:sticky; top: 80px">
                                <label for="" style="width: 19%">Muy satisfecho</label>
                                <label for="" style="width: 19%">Algo satisfecho</label>
                                <label for="" style="width: 19%">Satisfecho</label>
                                <label for="" style="width: 19%">Algo insatisfecho</label>
                                <label for="" style="width: 19%">Muy insatisfecho</label>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow p-3 mb-5 bg-body rounded"
                        style="width: 700px; margin-left: auto; margin-right: auto;">
                        <div class="card-body">
                            <div class="row">
                                <form action="{{ route('contestarEncuestas.store') }}" method="POST">
                                    @csrf
                                    @forelse ($encuestaObjetivo as $encuesta)
                                        <div class="aspecto">
                                            {{ $loop->iteration }}.- {{ $encuesta->aspectoObjetivo->nombre }}
                                        </div>
                                        <ul class="list-group" style="position: relative;">
                                            @forelse ($encuesta->aspectoObjetivo->preguntas as $pregunta)
                                                <div class="pregunta">
                                                    {{ $pregunta->Pregunta }}
                                                </div>
                                                <fieldset name="pregunta[]">
                                                    <div class="opciones">
                                                        <label for="super-happy{{ $pregunta->id }}">
                                                            <input class="super-happy" type="radio"
                                                                name="pregunta[{{ $pregunta->id }}]"
                                                                id="super-happy{{ $pregunta->id }}" value="1">
                                                            <svg class="iconoRespuesta" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                                            </svg>
                                                        </label>
                                                        <label for="happy{{ $pregunta->id }}">
                                                            <input type="radio" class="happy"
                                                                name="pregunta[{{ $pregunta->id }}]"
                                                                id="happy{{ $pregunta->id }}" value="2">
                                                            <svg class="iconoRespuesta" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                                width="100%" height="100%" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8C16.3,8 17,8.7 17,9.5M12,17.23C10.25,17.23 8.71,16.5 7.81,15.42L9.23,14C9.68,14.72 10.75,15.23 12,15.23C13.25,15.23 14.32,14.72 14.77,14L16.19,15.42C15.29,16.5 13.75,17.23 12,17.23Z" />
                                                            </svg>
                                                        </label>

                                                        <label for="neutral{{ $pregunta->id }}">
                                                            <input type="radio" class="neutral"
                                                                name="pregunta[{{ $pregunta->id }}]"
                                                                id="neutral{{ $pregunta->id }}" value="3">
                                                            <svg class="iconoRespuesta" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                                width="100%" height="100%" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M8.5,11A1.5,1.5 0 0,1 7,9.5A1.5,1.5 0 0,1 8.5,8A1.5,1.5 0 0,1 10,9.5A1.5,1.5 0 0,1 8.5,11M15.5,11A1.5,1.5 0 0,1 14,9.5A1.5,1.5 0 0,1 15.5,8A1.5,1.5 0 0,1 17,9.5A1.5,1.5 0 0,1 15.5,11M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M9,14H15A1,1 0 0,1 16,15A1,1 0 0,1 15,16H9A1,1 0 0,1 8,15A1,1 0 0,1 9,14Z" />
                                                            </svg>
                                                        </label>
                                                        <label for="sad{{ $pregunta->id }}">
                                                            <input type="radio" class="sad"
                                                                name="pregunta[{{ $pregunta->id }}]"
                                                                id="sad{{ $pregunta->id }}" value="4">
                                                            <svg class="iconoRespuesta" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                                width="100%" height="100%" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M15.5,8C16.3,8 17,8.7 17,9.5C17,10.3 16.3,11 15.5,11C14.7,11 14,10.3 14,9.5C14,8.7 14.7,8 15.5,8M10,9.5C10,10.3 9.3,11 8.5,11C7.7,11 7,10.3 7,9.5C7,8.7 7.7,8 8.5,8C9.3,8 10,8.7 10,9.5M12,14C13.75,14 15.29,14.72 16.19,15.81L14.77,17.23C14.32,16.5 13.25,16 12,16C10.75,16 9.68,16.5 9.23,17.23L7.81,15.81C8.71,14.72 10.25,14 12,14Z" />
                                                            </svg>
                                                        </label>
                                                        <label for="super-sad{{ $pregunta->id }}">
                                                            <input type="radio" class="super-sad"
                                                                name="pregunta[{{ $pregunta->id }}]"
                                                                id="super-sad{{ $pregunta->id }}" value="5">
                                                            <svg class="iconoRespuesta" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" />
                                                            </svg>
                                                        </label>
                                                    </div>
                                                </fieldset>


                                            @empty
                                                <h2>No hay preguntas para mostrar</h2>
                                            @endforelse

                                        </ul>
                                    @empty
                                        <h2>No hay encuestas disponibles</h2>
                                    @endforelse
                                    <input type="text" hidden name="idEncuestaAsignada" id="idEncuestaAsignada"
                                        value="{{ $id }}">
                                    <div class="boton">
                                        <button type="submit">Enviar Respuestas</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
