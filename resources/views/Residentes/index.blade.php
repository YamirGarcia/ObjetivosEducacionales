@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
    <link rel="stylesheet" type="text/css" href="css/estiloTablaResidentes.css">
    <link rel="stylesheet" type="text/css" href="css/iconos.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @livewireStyles
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Residentes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        @if ($residentes->count() == 0)
                            <h1 class="text-center">No existen Residentes</h1>
                        @else
                            @livewire('residentes.residentes-component')
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @can('crear-residentes')
            <a href="{{ route('residentes.create') }}" class="btn-flotante">Agregar Residentes</a>
        @endcan

    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @livewireScripts
    @stack('js')
@endsection
