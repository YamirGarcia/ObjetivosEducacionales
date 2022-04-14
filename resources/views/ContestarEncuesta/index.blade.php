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
                            @forelse ($encuestaObjetivo as $encuesta)
                                <div>
                                    {{$encuesta->estatus}}
                                    {{$encuesta->periodo}}
                                    {{$encuesta->carrera->carrera}}
                                    <form action="{{route('contestarEncuestas.update', $encuesta->id)}}" method="POST">
                                        @method('PATCH')
                                        @csrf
                                        @if ($encuesta->estatus != 'contestada')
                                            <button type="submit" class="btn btn-primary" >Contestar</button>
                                        @else
                                            <button class="btn btn-success" disabled>Encuesta Contestada</button>
                                        @endif
                                        <input type="text" hidden value="1">
                                    </form>
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