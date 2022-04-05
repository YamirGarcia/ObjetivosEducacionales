@extends('layouts.app')

@section('estilos')

<link rel="stylesheet" type="text/css" href="css/estiloAdicionalRol.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Agregar Evaluador</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
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
                        {!! Form::open(array('route' => 'evaluadores.store','method'=>'POST')) !!}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nombres">Nombre</label>
                                    {!! Form::text('nombres', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    {!! Form::text('apellidos', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                            {{--  --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="empresa">Empresa</label>
                                        {!! Form::text('empresa', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="idDepartamento">Departamento</label>
                                        {!! Form::text('idDepartamento', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                    <label for="telefono">Télefono</label>
                                    {!! Form::text('telefono', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Grupo de Interes</label>
                                    <select name="idGrupoDeInteres" class="form-control">
                                        @foreach ($grupos as $grupo)
                                            <option  value="{{$grupo->id}}">{{$grupo ->nombre}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="contraseña">Contraseña</label>
                                        {!! Form::password('contraseña', array('class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="confirm-password">Confirmar Contraseña</label>
                                        {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                                    </div>
                                </div>                            
                        </div>
                            {{--  --}}
                            <div class="row">
                                                           

                                <div class="col">
                                    <div class="form-group">
                                    <label for="correo">Correo</label>
                                    {!! Form::text('correo', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="rol">Rol</label>
                                    <input type="text" readonly name="rol" class="form-control" value="Evaluador">
                                </div>
                            </div>
                        </div>
                            {{--  --}}
                            <input type="text" readonly name="creadopor" class="form-control" style="visibility: hidden;" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">

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