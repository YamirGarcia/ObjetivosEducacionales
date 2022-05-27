@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="css/estiloTablaCarreraIndex.css">
    <link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
    <link rel="stylesheet" type="text/css" href="css/iconos.css">
    <link rel="stylesheet" type="text/css" href="css/badges.css">
    @livewireStyles
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">
                <a style="text-decoration: none; color: #6c757d" href="/carreras">Carreras</a>
            </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        {{-- @if ($carreras->count() == 0)
                            <h1 class="text-center">No existen carreras que mostrar</h1>
                        @else --}}
                            <div class="card-body">
                                @livewire('carreras.tabla-carreras-component')
                                <div class="pagination justify-content-end">
                                    {{-- {!! $carreras->links() !!} --}}
                                </div>
                            </div>
                        {{-- @endif --}}
                        @can('crear-carrera')
                            <a href="#" class="btn-flotante" data-toggle="modal" data-target="#modalAgregar">Agregar
                                Carrera</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($carreras as $carrera)
        @include('profile.editar_carrera')
        @include('profile.add_user_to_degree')
        @include('profile.atributos_carrera')
        @include('profile.objetivos_carrera')
    @endforeach

    <!-- Modal para añadir carrera -->
    @include('profile.añadir_carrera')
    @livewireScripts
    @stack('scripts')
@endsection

@section('js')

@endsection
