@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="css/estiloContestarEncuestas.css">
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
                                @forelse ($encuestaObjetivo as $encuesta)
                                    <div class="cardEncuesta">
                                        <div class="cardDentro">
                                            <span class="estatus">
                                                @if ($encuesta->estatus == 'enviada')
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="32"
                                                        height="32" style="fill: #0077b6">
                                                        <path
                                                            d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L478.9 160.8C412.3 167.2 356.5 210.8 332.6 270.6L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM294.4 339.2L320.8 319.4C320.3 324.9 320 330.4 320 336C320 378.5 335.1 417.6 360.2 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2zM640 336C640 415.5 575.5 480 496 480C416.5 480 352 415.5 352 336C352 256.5 416.5 192 496 192C575.5 192 640 256.5 640 336zM540.7 292.7L480 353.4L451.3 324.7C445.1 318.4 434.9 318.4 428.7 324.7C422.4 330.9 422.4 341.1 428.7 347.3L468.7 387.3C474.9 393.6 485.1 393.6 491.3 387.3L563.3 315.3C569.6 309.1 569.6 298.9 563.3 292.7C557.1 286.4 546.9 286.4 540.7 292.7H540.7z" />
                                                    </svg>
                                                @endif
                                                @if ($encuesta->estatus == 'recibida')
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="32"
                                                        height="32" style="fill: #ffa200">
                                                        <path
                                                            d="M493.6 163c-24.88-19.62-45.5-35.37-164.3-121.6C312.7 29.21 279.7 0 256.4 0H255.6C232.3 0 199.3 29.21 182.6 41.38c-118.8 86.25-139.4 101.1-164.3 121.6C6.75 172 0 186 0 200.8v263.2C0 490.5 21.49 512 48 512h416c26.51 0 48-21.49 48-47.1V200.8C512 186 505.3 172 493.6 163zM303.2 367.5C289.1 378.5 272.5 384 256 384s-33.06-5.484-47.16-16.47L64 254.9V208.5c21.16-16.59 46.48-35.66 156.4-115.5c3.18-2.328 6.891-5.187 10.98-8.353C236.9 80.44 247.8 71.97 256 66.84c8.207 5.131 19.14 13.6 24.61 17.84c4.09 3.166 7.801 6.027 11.15 8.478C400.9 172.5 426.6 191.7 448 208.5v46.32L303.2 367.5z" />
                                                    </svg>
                                                @endif
                                                @if ($encuesta->estatus == 'contestada')
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="32"
                                                        height="32" style="fill: #52b788">
                                                        <path
                                                            d="M336 64h-53.88C268.9 26.8 233.7 0 192 0S115.1 26.8 101.9 64H48C21.5 64 0 85.48 0 112v352C0 490.5 21.5 512 48 512h288c26.5 0 48-21.48 48-48v-352C384 85.48 362.5 64 336 64zM192 64c17.67 0 32 14.33 32 32s-14.33 32-32 32S160 113.7 160 96S174.3 64 192 64zM282.9 262.8l-88 112c-4.047 5.156-10.02 8.438-16.53 9.062C177.6 383.1 176.8 384 176 384c-5.703 0-11.25-2.031-15.62-5.781l-56-48c-10.06-8.625-11.22-23.78-2.594-33.84c8.609-10.06 23.77-11.22 33.84-2.594l36.98 31.69l72.52-92.28c8.188-10.44 23.3-12.22 33.7-4.062C289.3 237.3 291.1 252.4 282.9 262.8z" />
                                                    </svg>
                                                @endif
                                            </span>
                                            <div class="carrera">
                                                {{ $encuesta->carrera->carrera }}
                                            </div>
                                            <br>
                                            <div class="periodo">
                                                Periodo a Evaluar: 
                                                <br>
                                                {{ $encuesta->periodo }}
                                            </div>
                                            <form action="{{ route('contestarEncuestas.update', $encuesta->id) }}"
                                                method="POST">
                                                @method('PATCH')
                                                @csrf
                                                @if ($encuesta->estatus != 'contestada')
                                                    <button type="submit">
                                                        Contestar
                                                    </button>
                                                    {{-- <button type="submit" >Contestar</button> --}}
                                                @else
                                                    <button class="btn btn-success" disabled>Encuesta Contestada</button>
                                                @endif
                                                <input type="text" name="tipoEncuesta" id="tipoEncuesta" hidden value="1">
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <h2>No hay encuestas disponibles</h2>
                                @endforelse

                                @forelse ($encuestaAtributo as $encuesta)
                                <div class="cardEncuesta">
                                    <div class="cardDentro">
                                        <span class="estatus">
                                            @if ($encuesta->estatus == 'enviada')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="32"
                                                    height="32" style="fill: #0077b6">
                                                    <path
                                                        d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L478.9 160.8C412.3 167.2 356.5 210.8 332.6 270.6L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM294.4 339.2L320.8 319.4C320.3 324.9 320 330.4 320 336C320 378.5 335.1 417.6 360.2 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2zM640 336C640 415.5 575.5 480 496 480C416.5 480 352 415.5 352 336C352 256.5 416.5 192 496 192C575.5 192 640 256.5 640 336zM540.7 292.7L480 353.4L451.3 324.7C445.1 318.4 434.9 318.4 428.7 324.7C422.4 330.9 422.4 341.1 428.7 347.3L468.7 387.3C474.9 393.6 485.1 393.6 491.3 387.3L563.3 315.3C569.6 309.1 569.6 298.9 563.3 292.7C557.1 286.4 546.9 286.4 540.7 292.7H540.7z" />
                                                </svg>
                                            @endif
                                            @if ($encuesta->estatus == 'recibida')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="32"
                                                    height="32" style="fill: #ffa200">
                                                    <path
                                                        d="M493.6 163c-24.88-19.62-45.5-35.37-164.3-121.6C312.7 29.21 279.7 0 256.4 0H255.6C232.3 0 199.3 29.21 182.6 41.38c-118.8 86.25-139.4 101.1-164.3 121.6C6.75 172 0 186 0 200.8v263.2C0 490.5 21.49 512 48 512h416c26.51 0 48-21.49 48-47.1V200.8C512 186 505.3 172 493.6 163zM303.2 367.5C289.1 378.5 272.5 384 256 384s-33.06-5.484-47.16-16.47L64 254.9V208.5c21.16-16.59 46.48-35.66 156.4-115.5c3.18-2.328 6.891-5.187 10.98-8.353C236.9 80.44 247.8 71.97 256 66.84c8.207 5.131 19.14 13.6 24.61 17.84c4.09 3.166 7.801 6.027 11.15 8.478C400.9 172.5 426.6 191.7 448 208.5v46.32L303.2 367.5z" />
                                                </svg>
                                            @endif
                                            @if ($encuesta->estatus == 'contestada')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="32"
                                                    height="32" style="fill: #52b788">
                                                    <path
                                                        d="M336 64h-53.88C268.9 26.8 233.7 0 192 0S115.1 26.8 101.9 64H48C21.5 64 0 85.48 0 112v352C0 490.5 21.5 512 48 512h288c26.5 0 48-21.48 48-48v-352C384 85.48 362.5 64 336 64zM192 64c17.67 0 32 14.33 32 32s-14.33 32-32 32S160 113.7 160 96S174.3 64 192 64zM282.9 262.8l-88 112c-4.047 5.156-10.02 8.438-16.53 9.062C177.6 383.1 176.8 384 176 384c-5.703 0-11.25-2.031-15.62-5.781l-56-48c-10.06-8.625-11.22-23.78-2.594-33.84c8.609-10.06 23.77-11.22 33.84-2.594l36.98 31.69l72.52-92.28c8.188-10.44 23.3-12.22 33.7-4.062C289.3 237.3 291.1 252.4 282.9 262.8z" />
                                                </svg>
                                            @endif
                                        </span>
                                        <div class="carrera">
                                            {{ $encuesta->carrera->carrera }}
                                        </div>
                                        <br>
                                        <div class="periodo">
                                            Periodo a Evaluar: 
                                            <br>
                                            {{ $encuesta->periodo }}
                                        </div>
                                        <form action="{{ route('contestarEncuestas.update', $encuesta->id) }}"
                                            method="POST">
                                            @method('PATCH')
                                            @csrf
                                            @if ($encuesta->estatus != 'contestada')
                                                <button type="submit">
                                                    Contestar
                                                </button>
                                                {{-- <button type="submit" >Contestar</button> --}}
                                            @else
                                                <button class="btn btn-success" disabled>Encuesta Contestada</button>
                                            @endif
                                            <input type="text" name="tipoEncuesta" id="tipoEncuesta" hidden value="2">
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <h2>No hay encuestas disponibles</h2>
                            @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
