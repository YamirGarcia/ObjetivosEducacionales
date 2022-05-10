@extends('layouts.app')

@section('estilos')
    {{-- <link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
    <link rel="stylesheet" type="text/css" href="/css/iconos.css">
    <link rel="stylesheet" type="text/css" href="/css/estiloFinalAspecto.css">
    <link rel="stylesheet" type="text/css" href="/css/estilosGenerales.css"> --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/pattern-fill.js"></script>
    <script src="https://code.highcharts.com/themes/high-contrast-light.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @livewireStyles
@endsection

@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Residentes</h3>
    </div>
    <div class="section-body" style="background:rgba(0,255,0,0)">
        <div class="row" style="background:rgba(123,200,255,0)">
            <div class="col-lg-12" style="background:rgba(180, 20, 174, 0)">
                <div class="card shadow mb-5 bg-body rounded" style="background:rgba(9, 138, 82, 0);">

                        @livewire('estadisticas.estadisticas-component')

                </div>
            </div>
        </div>
    </div>


</section>
    @livewireScripts
@endsection
