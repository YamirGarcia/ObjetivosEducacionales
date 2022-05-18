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
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {!! Form::open(['route' => 'residentes.store', 'method' => 'POST']) !!}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nombres">Nombres: </label>
                                        {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos: </label>
                                        {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="numeroControl">No. Control: </label>
                                        {!! Form::text('numeroControl', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="correo">Correo: </label>
                                        {!! Form::text('correo', null, ['class' => 'form-control', 'type' => 'email']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="carrera">Carrera: </label>
                                        <select class="form-control" name="carrera" style="margin-bottom: 2rem;">

                                            <option value="Administración">Administración</option>
                                            <option value="Bioquímica">Bioquímica</option>
                                            <option value="Contador Público">Contador Público</option>
                                            <option value="Eléctrica">Eléctrica</option>
                                            <option value="Electrónica">Electrónica</option>
                                            <option value="Gestión Empresarial">Gestión Empresarial</option>
                                            <option value="Industrial">Industrial</option>
                                            <option value="Materiales">Materiales</option>
                                            <option value="Mecánica">Mecánica</option>
                                            <option value="Mecatrónica">Mecatrónica</option>
                                            <option value="Sistemas Computacionales">Sistemas Computacionales</option>
                                            <option value="TICS">TICS</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5" style="margin: 0 auto">
                                <button type="submit"
                                    class="btn btn-primary btn-block rounded-pill shadow-sm">Guardar</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
