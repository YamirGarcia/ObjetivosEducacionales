@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
    <link rel="stylesheet" type="text/css" href="css/iconos.css">
    <link rel="stylesheet" type="text/css" href="css/estiloTablaEncuestas.css">
    <link rel="stylesheet" type="text/css" href="css/estiloAsignarEncuesta.css">
    <link rel="stylesheet" type="text/css" href="css/estilosBotones.css">
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
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">

                                        @if ($encuestasObjetivos->count() == 0)
                                            <h1 class="text-center">No Existen Encuestas Asignadas de Objetivos
                                                Educacionales
                                            </h1>
                                        @else
                                            <table class="tabla-general">
                                                <thead>
                                                    <tr class="table100-head">
                                                        <th class="column1">Estatus</th>
                                                        <th class="column2">Evaluador</th>
                                                        <th class="column3">Carrera</th>
                                                        <th class="column4">Periodo</th>
                                                        <th class="column6">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($encuestasObjetivos as $encuesta)
                                                        <tr class="table100-head">
                                                            @if ($encuesta->estatus == 'enviada')
                                                                <td class="column1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 640 512" width="24" height="24"
                                                                        style="fill: #0077b6">
                                                                        <path
                                                                            d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L478.9 160.8C412.3 167.2 356.5 210.8 332.6 270.6L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM294.4 339.2L320.8 319.4C320.3 324.9 320 330.4 320 336C320 378.5 335.1 417.6 360.2 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2zM640 336C640 415.5 575.5 480 496 480C416.5 480 352 415.5 352 336C352 256.5 416.5 192 496 192C575.5 192 640 256.5 640 336zM540.7 292.7L480 353.4L451.3 324.7C445.1 318.4 434.9 318.4 428.7 324.7C422.4 330.9 422.4 341.1 428.7 347.3L468.7 387.3C474.9 393.6 485.1 393.6 491.3 387.3L563.3 315.3C569.6 309.1 569.6 298.9 563.3 292.7C557.1 286.4 546.9 286.4 540.7 292.7H540.7z" />
                                                                    </svg>
                                                                </td>
                                                            @endif
                                                            @if ($encuesta->estatus == 'recibida')
                                                                <td class="column1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 512 512" width="24" height="24"
                                                                        style="fill: #ffa200">
                                                                        <path
                                                                            d="M493.6 163c-24.88-19.62-45.5-35.37-164.3-121.6C312.7 29.21 279.7 0 256.4 0H255.6C232.3 0 199.3 29.21 182.6 41.38c-118.8 86.25-139.4 101.1-164.3 121.6C6.75 172 0 186 0 200.8v263.2C0 490.5 21.49 512 48 512h416c26.51 0 48-21.49 48-47.1V200.8C512 186 505.3 172 493.6 163zM303.2 367.5C289.1 378.5 272.5 384 256 384s-33.06-5.484-47.16-16.47L64 254.9V208.5c21.16-16.59 46.48-35.66 156.4-115.5c3.18-2.328 6.891-5.187 10.98-8.353C236.9 80.44 247.8 71.97 256 66.84c8.207 5.131 19.14 13.6 24.61 17.84c4.09 3.166 7.801 6.027 11.15 8.478C400.9 172.5 426.6 191.7 448 208.5v46.32L303.2 367.5z" />
                                                                    </svg>
                                                                </td>
                                                            @endif
                                                            @if ($encuesta->estatus == 'contestada')
                                                                <td class="column1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 384 512" width="24" height="24"
                                                                        style="fill: #52b788">
                                                                        <path
                                                                            d="M336 64h-53.88C268.9 26.8 233.7 0 192 0S115.1 26.8 101.9 64H48C21.5 64 0 85.48 0 112v352C0 490.5 21.5 512 48 512h288c26.5 0 48-21.48 48-48v-352C384 85.48 362.5 64 336 64zM192 64c17.67 0 32 14.33 32 32s-14.33 32-32 32S160 113.7 160 96S174.3 64 192 64zM282.9 262.8l-88 112c-4.047 5.156-10.02 8.438-16.53 9.062C177.6 383.1 176.8 384 176 384c-5.703 0-11.25-2.031-15.62-5.781l-56-48c-10.06-8.625-11.22-23.78-2.594-33.84c8.609-10.06 23.77-11.22 33.84-2.594l36.98 31.69l72.52-92.28c8.188-10.44 23.3-12.22 33.7-4.062C289.3 237.3 291.1 252.4 282.9 262.8z" />
                                                                    </svg>
                                                                </td>
                                                            @endif
                                                            <td class="column2">
                                                                {{ $encuesta->evaluadorAsignado->nombres }}
                                                            </td>
                                                            <td class="column3">{{ $encuesta->carrera->carrera }}
                                                            </td>
                                                            <td class="column4">{{ $encuesta->periodo }}</td>
                                                            <td class="column5">
                                                                @if ($encuesta->estatus == 'contestada')
                                                                    <form action="{{ route('verRespuestas') }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            style="border: none; background: none">
                                                                            <div class="icon create-fill">
                                                                                <i>
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 576 512">
                                                                                        <path
                                                                                            d="M480 80C480 53.49 458.5 32 432 32h-288C117.5 32 96 53.49 96 80V384h384V80zM378.9 166.8l-88 112c-4.031 5.156-10 8.438-16.53 9.062C273.6 287.1 272.7 287.1 271.1 287.1c-5.719 0-11.21-2.019-15.58-5.769l-56-48C190.3 225.6 189.2 210.4 197.8 200.4c8.656-10.06 23.81-11.19 33.84-2.594l36.97 31.69l72.53-92.28c8.188-10.41 23.31-12.22 33.69-4.062C385.3 141.3 387.1 156.4 378.9 166.8zM528 288H512v112c0 8.836-7.164 16-16 16h-416C71.16 416 64 408.8 64 400V288H48C21.49 288 0 309.5 0 336v96C0 458.5 21.49 480 48 480h480c26.51 0 48-21.49 48-48v-96C576 309.5 554.5 288 528 288z" />
                                                                                    </svg>
                                                                                </i>
                                                                            </div>
                                                                        </button>
                                                                        {{-- <button class="btn btn-primary">Ver respuestas</button> --}}
                                                                        <input type="text" name="idEncuestaAsignada"
                                                                            id="idEncuestaAsignada" hidden
                                                                            value="{{ $encuesta->id }}">
                                                                        <input type="text" name="tipoEncuesta"
                                                                            id="tipoEncuesta" hidden
                                                                            value="1">
                                                                    </form>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        @if ($encuestasAtributos->count() == 0)
                                            <h1 class="text-center">No Existen Encuestas Asignadas de Atributos</h1>
                                        @else
                                            <table class="tabla-general">
                                                <thead>
                                                    <tr class="table100-head">
                                                        <th class="column1">Estatus</th>
                                                        <th class="column2">Evaluador</th>
                                                        <th class="column3">Residente</th>
                                                        <th class="column4">Carrera</th>
                                                        <th class="column5">Periodo</th>
                                                        <th class="column6">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($encuestasAtributos as $encuesta)
                                                        <tr class="table100-head">
                                                            @if ($encuesta->estatus == 'enviada')
                                                                <td class="column1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 640 512" width="24" height="24"
                                                                        style="fill: #0077b6">
                                                                        <path
                                                                            d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L478.9 160.8C412.3 167.2 356.5 210.8 332.6 270.6L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM294.4 339.2L320.8 319.4C320.3 324.9 320 330.4 320 336C320 378.5 335.1 417.6 360.2 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2zM640 336C640 415.5 575.5 480 496 480C416.5 480 352 415.5 352 336C352 256.5 416.5 192 496 192C575.5 192 640 256.5 640 336zM540.7 292.7L480 353.4L451.3 324.7C445.1 318.4 434.9 318.4 428.7 324.7C422.4 330.9 422.4 341.1 428.7 347.3L468.7 387.3C474.9 393.6 485.1 393.6 491.3 387.3L563.3 315.3C569.6 309.1 569.6 298.9 563.3 292.7C557.1 286.4 546.9 286.4 540.7 292.7H540.7z" />
                                                                    </svg>
                                                                </td>
                                                            @endif
                                                            @if ($encuesta->estatus == 'recibida')
                                                                <td class="column1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 512 512" width="24" height="24"
                                                                        style="fill: #ffa200">
                                                                        <path
                                                                            d="M493.6 163c-24.88-19.62-45.5-35.37-164.3-121.6C312.7 29.21 279.7 0 256.4 0H255.6C232.3 0 199.3 29.21 182.6 41.38c-118.8 86.25-139.4 101.1-164.3 121.6C6.75 172 0 186 0 200.8v263.2C0 490.5 21.49 512 48 512h416c26.51 0 48-21.49 48-47.1V200.8C512 186 505.3 172 493.6 163zM303.2 367.5C289.1 378.5 272.5 384 256 384s-33.06-5.484-47.16-16.47L64 254.9V208.5c21.16-16.59 46.48-35.66 156.4-115.5c3.18-2.328 6.891-5.187 10.98-8.353C236.9 80.44 247.8 71.97 256 66.84c8.207 5.131 19.14 13.6 24.61 17.84c4.09 3.166 7.801 6.027 11.15 8.478C400.9 172.5 426.6 191.7 448 208.5v46.32L303.2 367.5z" />
                                                                    </svg>
                                                                </td>
                                                            @endif
                                                            @if ($encuesta->estatus == 'contestada')
                                                                <td class="column1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 384 512" width="24" height="24"
                                                                        style="fill: #52b788">
                                                                        <path
                                                                            d="M336 64h-53.88C268.9 26.8 233.7 0 192 0S115.1 26.8 101.9 64H48C21.5 64 0 85.48 0 112v352C0 490.5 21.5 512 48 512h288c26.5 0 48-21.48 48-48v-352C384 85.48 362.5 64 336 64zM192 64c17.67 0 32 14.33 32 32s-14.33 32-32 32S160 113.7 160 96S174.3 64 192 64zM282.9 262.8l-88 112c-4.047 5.156-10.02 8.438-16.53 9.062C177.6 383.1 176.8 384 176 384c-5.703 0-11.25-2.031-15.62-5.781l-56-48c-10.06-8.625-11.22-23.78-2.594-33.84c8.609-10.06 23.77-11.22 33.84-2.594l36.98 31.69l72.52-92.28c8.188-10.44 23.3-12.22 33.7-4.062C289.3 237.3 291.1 252.4 282.9 262.8z" />
                                                                    </svg>
                                                                </td>
                                                            @endif
                                                            <td class="column2">
                                                                {{ $encuesta->evaluadorAsignado->nombres }}
                                                            </td>
                                                            <td class="column3">
                                                                {{ $encuesta->residenteAsignado->nombre }}
                                                            </td>
                                                            <td class="column4">{{ $encuesta->carrera->carrera }}
                                                            </td>
                                                            <td class="column5">{{ $encuesta->periodo }}</td>
                                                            <td class="column6">
                                                                @if ($encuesta->estatus == 'contestada')
                                                                <form action="{{ route('verRespuestas') }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        style="border: none; background: none">
                                                                        <div class="icon create-fill">
                                                                            <i>
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 576 512">
                                                                                    <path
                                                                                        d="M480 80C480 53.49 458.5 32 432 32h-288C117.5 32 96 53.49 96 80V384h384V80zM378.9 166.8l-88 112c-4.031 5.156-10 8.438-16.53 9.062C273.6 287.1 272.7 287.1 271.1 287.1c-5.719 0-11.21-2.019-15.58-5.769l-56-48C190.3 225.6 189.2 210.4 197.8 200.4c8.656-10.06 23.81-11.19 33.84-2.594l36.97 31.69l72.53-92.28c8.188-10.41 23.31-12.22 33.69-4.062C385.3 141.3 387.1 156.4 378.9 166.8zM528 288H512v112c0 8.836-7.164 16-16 16h-416C71.16 416 64 408.8 64 400V288H48C21.49 288 0 309.5 0 336v96C0 458.5 21.49 480 48 480h480c26.51 0 48-21.49 48-48v-96C576 309.5 554.5 288 528 288z" />
                                                                                </svg>
                                                                            </i>
                                                                        </div>
                                                                    </button>
                                                                    {{-- <button class="btn btn-primary">Ver respuestas</button> --}}
                                                                    <input type="text" name="idEncuestaAsignada"
                                                                        id="idEncuestaAsignada" hidden
                                                                        value="{{ $encuesta->id }}">
                                                                    <input type="text" name="tipoEncuesta"
                                                                        id="tipoEncuesta" hidden
                                                                        value="2">
                                                                </form>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
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
@endsection
