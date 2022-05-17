@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="../css/estilofondo.css">
@livewireStyles
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Agregar Evaluador</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12" style="margin: 0 auto">
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
                                    {!! Form::text('nombres', null, array('class' => 'form-control','pattern' => '[a-zA-Z ]{2,254}')) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    {!! Form::text('apellidos', null, array('class' => 'form-control','pattern' => '[a-zA-Z ]{2,254}')) !!}
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
                                        {!! Form::text('idDepartamento', null, array('class' => 'form-control','pattern' => '[a-zA-Z ]{2,254}')) !!}
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
                                        @foreach ($grupos as $grupo)
                                            <option  value="{{$grupo->id}}">{{$grupo ->nombre}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    {{-- @livewire('elementos.agregar-grupo-interes-component') --}}
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
<div class="modal" id="modalGrupoInteres">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Grupos de Interes</h5>
                <button class="btn-tabla" type="button" data-dismiss="modal">
                    <div class="icon trash-fill">
                      <i> 
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
                      </i>
                  </div>
                  </button>    
            </div>
            
                <div class="modal-body">
                    <form action="">

                        <h3>Dentro del Modal</h3>
                        <input type="text" placeholder="Ingresa nuevo Grupo de Interés" class="form-control">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregar">Agregar</button>
                    </div>
                </form>
            
        </div>
    </div>
</div>
@livewireScripts
@endsection