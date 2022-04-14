@extends('layouts.app')

@section('estilos')
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Contestar Encuestas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <div class="row">
                                <form action="{{ route('contestarEncuestas.store') }}" method="POST">
                                    @csrf
                                    @forelse ($encuestaObjetivo as $encuesta)
                                        <div style="display:flex">
                                            <label for="">ASPECTO:</label>
                                            {{ $encuesta->aspectoObjetivo->nombre }}
                                        </div>
                                        <ul class="list-group" style="position: relative;">
                                            @forelse ($encuesta->aspectoObjetivo->preguntas as $pregunta)
                                                <li class="list-group-item">{{ $pregunta->Pregunta }}
                                                    <div style="position: absolute; right: 0; top: 0;">
                                                        <fieldset name="pregunta[]">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pregunta[{{ $pregunta->id }}]"
                                                                    id="pregunta{{ $pregunta->id }}" value="1">
                                                                <label class="form-check-label" for="pregunta{{ $pregunta->id }}">1</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pregunta[{{ $pregunta->id }}]"
                                                                    id="pregunta{{ $pregunta->id }}" value="2">
                                                                <label class="form-check-label" for="pregunta{{ $pregunta->id }}">2</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pregunta[{{ $pregunta->id }}]"
                                                                    id="pregunta{{ $pregunta->id }}" value="3">
                                                                <label class="form-check-label" for="pregunta{{ $pregunta->id }}">3</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pregunta[{{ $pregunta->id }}]"
                                                                    id="pregunta{{ $pregunta->id }}" value="4">
                                                                <label class="form-check-label" for="pregunta{{ $pregunta->id }}">4</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="pregunta[{{ $pregunta->id }}]"
                                                                    id="pregunta{{ $pregunta->id }}" value="5">
                                                                <label class="form-check-label" for="pregunta{{ $pregunta->id }}">5</label>
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                </li>

                                            @empty
                                                <h2>No hay preguntas para mostrar</h2>
                                            @endforelse

                                        </ul>
                                    @empty
                                        <h2>No hay encuestas disponibles</h2>
                                    @endforelse
                                    <input type="text" hidden name="idEncuestaAsignada" id="idEncuestaAsignada"
                                        value="{{ $id }}">
                                    <button type="submit" class="btn btn-success">Enviar Respuestas</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
