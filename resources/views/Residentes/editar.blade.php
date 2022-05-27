@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="/css/estilosGenerales.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">
            <a style="text-decoration: none; color: #6c757d" href="/residentes" >Residentes</a>
            <a style="text-decoration: none; color: #6c757d" >/
                Editar Residentes</a></h3>
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
                        {{-- {!! Form::model($residente, ['method' => 'PATCH','route' => ['residentes.update', $residente->id]]) !!}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    {!! Form::text('nombres', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>                            
                        </div>                            
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="boton-submit" id="enviarForm">Guardar</button>
                        </div>                     
                        {!! Form::close() !!} --}}
                        
                        {!! Form::model($residente, ['method' => 'PATCH', 'route' => ['residentes.update', $residente->id]]) !!}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nombres">Nombre(s): </label>
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

                                            <option value="Administración" @if ($residente->carrera == "Administración") selected @endif >Administración</option>
                                            <option value="Bioquímica" @if ($residente->carrera == "Bioquímica") selected @endif>Bioquímica</option>
                                            <option value="Contador Público" @if ($residente->carrera == "Contador Público") selected @endif>Contador Público</option>
                                            <option value="Eléctrica" @if ($residente->carrera == "Eléctrica") selected @endif>Eléctrica</option>
                                            <option value="Electrónica" @if ($residente->carrera == "Electrónica") selected @endif>Electrónica</option>
                                            <option value="Gestión Empresarial" @if ($residente->carrera == "Gestión Empresarial") selected @endif>Gestión Empresarial</option>
                                            <option value="Industrial" @if ($residente->carrera == "Industrial") selected @endif>Industrial</option>
                                            <option value="Materiales" @if ($residente->carrera == "Materiales") selected @endif>Materiales</option>
                                            <option value="Mecánica" @if ($residente->carrera == "Mecánica") selected @endif>Mecánica</option>
                                            <option value="Mecatrónica" @if ($residente->carrera == "Mecatrónica") selected @endif>Mecatrónica</option>
                                            <option value="Sistemas Computacionales" @if ($residente->carrera == "Sistemas Computacionales") selected @endif>Sistemas Computacionales</option>
                                            <option value="TICS" @if ($residente->carrera == "TICS") selected @endif>TICS</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="boton-submit" id="enviarForm">Guardar</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection