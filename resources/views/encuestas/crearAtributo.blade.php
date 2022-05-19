@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="css/estiloCrearEncuesta.css">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear nueva Encuesta</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-11" style="margin: 0 auto">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revisa los Campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {!! Form::open(['route' => 'encuestas.store', 'method' => 'POST', 'onsubmit' => 'return verificar();']) !!}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="evaluador" class="form-label">Evaluador</label>
                                        <select name="evaluador" id="evaluador" class="form-select" required>
                                            <option selected="selected" disabled></option>
                                            @foreach ($evaluadores as $evaluador)
                                                <option value="{{ $evaluador->id }}">{{ $evaluador->nombres }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="periodo" class="form-label">Periodo de evaluacion</label>
                                        {{-- <input type="text" class="form-control" name="periodo" id="periodo"> --}}
                                        <select name="periodo" id="periodo" class="form form-control" required>
                                            <option value="" selected disabled>Seleccione periodo</option>
                                            <option value="ENE-JUN-{{ date('Y') }}">ENE-JUN {{ date('Y') }}</option>
                                            <option value="VERANO-{{ date('Y') }}">VERANO {{ date('Y') }}</option>
                                            <option value="AGO-DIC-{{ date('Y') }}">AGO-DIC {{ date('Y') }}</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="residente" class="form-label">Residente</label>
                                        <select name="residente" id="residente" class="form-select" required>
                                            <option selected="selected" disabled></option>
                                            @foreach ($residentes as $residente)
                                                <option value="{{ $residente->id }}">{{ $residente->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="encuesta" class="form-label">Atributos</label>

                                @foreach ($encuestas as $encuesta)
                                    <div class="accordion" id="accordionExample{{ $encuesta->id }}">
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $encuesta->id }}">
                                                <h2 class="mb-0" style="display: flex">
                                                    {{-- <input class="vertical-centered" type="text"
                                                        id="check{{ $encuesta->id }}" name="encuesta[]"
                                                        value="{{ $encuesta->id }}"> --}}
                                                    <label for="check{{ $encuesta->id }}"></label>
                                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapse{{ $encuesta->id }}"
                                                        aria-expanded="true" aria-controls="collapse{{ $encuesta->id }}"
                                                        style="text-decoration: none">
                                                        {{ $loop->iteration }}.- {{ $encuesta->descripcion }}
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="collapse{{ $encuesta->id }}" class="collapse"
                                                aria-labelledby="heading{{ $encuesta->id }}"
                                                data-parent="#accordionExample{{ $encuesta->id }}">
                                                <div class="card-body">
                                                    <h4>Aspectos (Disponibles: {{ $encuesta->aspectos->count() }})</h4>
                                                    @forelse ($encuesta->aspectos as $aspecto)
                                                        {{-- Esto es para que se selecciones todos los aspecots --}}
                                                        {{-- <script>
                                                $(function(){
                                                $('#check{{$encuesta->id}}').change(function() {
                                                  $('#checkAspecto{{$aspecto->id}} > input[type=checkbox]').prop('checked', $(this).is(':checked'));
                                                });
                                              });
                                            </script> --}}
                                                        <div class="accordion"
                                                            id="accordionExampleAspecto{{ $aspecto->id }}">
                                                            <div class="card">
                                                                <div class="card-header"
                                                                    id="headingAspecto{{ $aspecto->id }}">
                                                                    <h2 class="mb-0" style="display: flex">
                                                                        <input id="checkAspecto{{ $aspecto->id }}"
                                                                            class="vertical-centered" type="checkbox"
                                                                            name="encuestaAspectos[]"
                                                                            value="{{ $aspecto->id }}">
                                                                        <label
                                                                            for="checkAspecto{{ $aspecto->id }}"></label>
                                                                        <button
                                                                            class="btn btn-link btn-block text-left collapsed"
                                                                            type="button" data-toggle="collapse"
                                                                            data-target="#collapseAspecto{{ $aspecto->id }}"
                                                                            aria-expanded="true"
                                                                            aria-controls="collapseAspecto{{ $aspecto->id }}"
                                                                            style="text-decoration: none">
                                                                            {{ $loop->iteration }}.-
                                                                            {{ $aspecto->nombre }}
                                                                        </button>

                                                                    </h2>
                                                                </div>

                                                                <div id="collapseAspecto{{ $aspecto->id }}"
                                                                    class="collapse"
                                                                    aria-labelledby="headingAspecto{{ $aspecto->id }}"
                                                                    data-parent="#accordionExampleAspecto{{ $aspecto->id }}">
                                                                    <div class="card-body">
                                                                        <h4>Preguntas (Disponibles:
                                                                            {{ $aspecto->preguntas->count() }})</h4>
                                                                        <ol class="list-group list-group-numbered">
                                                                            @forelse ($aspecto->preguntas as $pregunta)
                                                                                <li class="list-group-item">
                                                                                    {{ $pregunta->Pregunta }}</li>
                                                                            @empty
                                                                                <p>No hay preguntas disponibles</p>
                                                                            @endforelse
                                                                        </ol>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <p>No hay aspectos disponibles</p>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            {{--  --}}

                            {{--  --}}

                            {{--  --}}
                            <div class="row">

                                <div class="col-6">
                                    {{-- <div class="form-group">
                                        <label for="">Roles</label>
                                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                                    </div> --}}
                                    <input type="text" name="rol" value="otro" hidden>
                                </div>

                                <input type="text" readonly name="creadopor" class="form-control"
                                    style="visibility: hidden;"
                                    value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">

                                <div class="col-5" style="margin: 0 auto">
                                    <button type="submit"
                                        class="btn btn-primary btn-block rounded-pill shadow-sm">Guardar</button>
                                </div>
                            </div>

                            <input type="text" name="tipoEncuesta" hidden id="tipoEncuesta" value="{{ $tipoEncuesta }}">
                            <input type="text" name="idCarrera" hidden id="idCarrera" value="{{ $carrera }}">

                            {!! Form::close() !!}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        function verificar() {
            var suma = 0;
            var boxes = document.getElementsByName('encuestaAspectos[]');
            for (var i = 0, j = boxes.length; i < j; i++) {
                if (boxes[i].checked == true) {
                    suma++;
                }
            }

            if (suma == 0) {
                // alert('No existe ningun aspecto seleccionada');
                Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Por favor seleccionado almenos 1 aspecto. '
                });
                return false;
            } else {     
                return true;
            }

        }
        //]]>
    </script>


@endsection
