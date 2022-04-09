@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="css/estiloBotonGuardar.css">
@endsection

@section('cssObjetivos')
    <style>
    .button, .tick {
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: sans-serif;
    position: relative;
  }
  
  .button {
    left: calc((100% - 50px) / 2);
    width: 130px;
    height: 50px;
    background: dodgerblue;
    border-radius: 12px;
    transition: all .3s cubic-bezier(0.67, 0.17, 0.40, 0.83);
  }
  
  .button svg {
    transform: rotate(180deg);
    transition: all .5s;
  }
  
  .button__circle {
    width: 7rem;
    height: 7rem;
    background: mediumseagreen;
    border-radius: 50px;
    transform: rotate(-180deg);
  }
  
  .button:hover {
    cursor: pointer;
  }
  
  .tick {
    color: white;
    font-size:1rem;
    transition: all .9s;
  }
    </style>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Usuario</h3>
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
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    {!! Form::text('name', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="apellido">Apellidos</label>
                                    {!! Form::text('apellido', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label>
                                    {!! Form::text('telefono', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    {!! Form::password('password', array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="confirm-password">Confirmar Password</label>
                                    {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Roles</label>
                                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                                
                            <button type="submit" class="button">
                                        <div class="tick">
                                        </div>
                            </button>
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