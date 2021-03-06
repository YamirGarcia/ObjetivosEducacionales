@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
<link rel="stylesheet" type="text/css" href="/css/estilosGenerales.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">
            <a style="text-decoration: none; color: #6c757d" href="/evaluadores">Evaluadores</a>
            <a style="text-decoration: none; color: #6c757d" href="{{ route('evaluadores.edit', $evaluador->id) }}">/
                Editar Evaluador</a>
        </h3>
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
                        {!! Form::model($evaluador, ['method' => 'PATCH','route' => ['evaluadores.update', $evaluador->id]]) !!}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nombres">Nombre</label>
                                    {!! Form::text('nombres', null, array('class' => 'form-control', 'pattern' => '[a-zA-Z ]{2,254}')) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    {!! Form::text('apellidos', null, array('class' => 'form-control', 'pattern' => '[a-zA-Z ]{2,254}')) !!}
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
                                        {!! Form::text('idDepartamento', null, array('class' => 'form-control', 'pattern' => '[a-zA-Z ]{2,254}')) !!}
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                    <label for="telefono">Télefono</label>
                                    {!! Form::text('telefono', null, array('class' => 'form-control', 'pattern' =>'^\d{10}$')) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Grupo de Interes</label>
                                    <select name="idGrupoDeInteres" class="form-control">
                                            <option value="{{$userGrupo[0]->id}}">{{$userGrupo[0]->nombre}}</option>
                                        @foreach ($grupos as $grupo)
                                            @if ($userGrupo[0]->id != $grupo->id)
                                                <option  value="{{$grupo->id}}">{{$grupo ->nombre}}</option>
                                            @endif
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
                                    {!! Form::text('correo', null, array('class' => 'form-control', 'pattern' =>"^[a-z0-9!#$%&'+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'+/=?^_`{|}~-]+)@(?:[a-z0-9](?:[a-z0-9-][a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$")) !!}
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

                            
                        <div class="col-xs-8 col-sm-12 col-md-15" style="left: -35px">
                            <button type="submit" class="boton-submit">Guardar</button>
                        </div>
                            <input type="text" name="idUserSession" style="visibility: hidden" value="{{$idUserSession[0]->id}}">
                        
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection