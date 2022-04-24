@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
    <link rel="stylesheet" type="text/css" href="/css/iconos.css">
    <link rel="stylesheet" type="text/css" href="/css/estiloFinalAspecto.css">
    <link rel="stylesheet" type="text/css" href="/css/estilosGenerales.css">
    @livewireStyles
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">
                <a style="text-decoration: none; color: #6c757d" href="/carreras">Carreras</a>
                <a style="text-decoration: none; color: #6c757d"
                    href="{{ route('Atributos.show', App\Models\Atributo::find($idAtributo)->carrera->id) }}">/
                    Atributos</a>
                <a style="text-decoration: none; color: #6c757d"
                    href="{{ route('AspectosAtributos.show', $idAtributo) }}">/ Aspectos</a>
            </h3>
        </div>

        @livewire('atributos.aspectos-atributos-component', ['idAtributo' => $idAtributo])
    
    </section>

    {{-- MODAL EDITAR ASPECTO --}}
    
    @livewireScripts
@endsection
