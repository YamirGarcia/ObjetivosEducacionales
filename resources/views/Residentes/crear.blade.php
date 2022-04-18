@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="/css/estilosGenerales.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Crear Residentes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revisa los Campos!</strong>
                            @foreach ($errors->all() as $error)
                            <span class="badge badge-danger">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        {!! Form::open(array('route' => 'residentes.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    {!! Form::text('nombre', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                            <div class="col-5" style="margin: 0 auto">
                                <button type="submit" class="btn btn-primary btn-block rounded-pill shadow-sm">Guardar</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection