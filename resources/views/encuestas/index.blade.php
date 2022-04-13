@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
<link rel="stylesheet" type="text/css" href="css/iconos.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Encuestas</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div style="display: inline;">
                    <div class="card-body">
                        <div class="row">
                            <h2>{{$temp}}</h2>
                        </div>
                        <a href="#" class="btn-flotante" data-toggle="modal" data-target="#modalAgregar">Asignar Encuesta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection