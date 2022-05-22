@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
<link rel="stylesheet" type="text/css" href="/css/estilosGenerales.css">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">

            <a style="text-decoration: none; color: #6c757d" href="/usuarios">Usuarios</a>

            <a style="text-decoration: none; color: #6c757d" href="{{ route('usuarios.edit', $user->id) }}">/ Editar Usuario</a>
            </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                     
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                        {!! Form::model($user, ['method' => 'PATCH','route' => ['usuarios.update', $user->id]]) !!}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    {!! Form::text('name', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{2,254}']) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="apellido">Apellidos</label>
                                    {!! Form::text('apellido', null, ['class' => 'form-control','pattern' => '[a-zA-Z ]{2,254}']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    {!! Form::tel('telefono', null, ['class' => 'form-control', 'pattern' =>'^\d{10}$']) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    {!! Form::email('email', null, ['class' => 'form-control', 'pattern' =>"^[a-z0-9!#$%&'+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'+/=?^_`{|}~-]+)@(?:[a-z0-9](?:[a-z0-9-][a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$"]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    {!! Form::password('password', array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="confirm-password">Confirmar Password</label>
                                    {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Roles</label>
                                    {{-- <select name="roles" id="" class="form-control">
                                        <option value="" selected disabled>Selecciona rol a asignar.</option>
                                        @foreach ($collection as $item)
                                            
                                        @endforeach
                                    </select> --}}
                                    {!! Form::select('rol', $roles,$userRole, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                                
                            <div class="col">
                                <button type="submit" class="boton-submit">Guardar</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    let button = document.querySelector('.button');
    let buttonText = document.querySelector('.tick');

    const tickMark = "<svg width=\"58\" height=\"45\" viewBox=\"0 0 58 45\" xmlns=\"http://www.w3.org/2000/svg\"><path fill=\"#fff\" fill-rule=\"nonzero\" d=\"M19.11 44.64L.27 25.81l5.66-5.66 13.18 13.18L52.07.38l5.65 5.65\"/></svg>";

    buttonText.innerHTML = "Guardar";

    button.addEventListener('click', function () {

        if (buttonText.innerHTML !== "Guardar") {
            buttonText.innerHTML = "Guardar";
        } else if (buttonText.innerHTML === "Guardar") {
            buttonText.innerHTML = tickMark;
        }
        this.classList.toggle('button__circle');
    });
</script>
@endsection