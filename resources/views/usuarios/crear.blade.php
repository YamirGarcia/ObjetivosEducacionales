@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Nuevo Usuario</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-11" style="margin: 0 auto">
                    <div class="card">
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
                            {!! Form::open(['route' => 'usuarios.store', 'method' => 'POST', 'class' => 'form-guardar']) !!}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nombre</label>
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="apellido">Apellidos</label>
                                        {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            {{--  --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="telefono">Télefono</label>
                                        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                            </div>
                            {{--  --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        {!! Form::password('password', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="confirm-password">Confirmar Contraseña</label>
                                        {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Roles</label>
                                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control']) !!}
                                    </div>
                                    {{-- <input type="text" name="rol" value="otro" hidden> --}}
                                </div>

                                <input type="text" readonly name="creadopor" class="form-control"
                                    style="visibility: hidden;"
                                    value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">

                                <div class="col-5" style="margin: 0 auto">
                                    <button type="submit"
                                        class="btn btn-primary btn-block rounded-pill shadow-sm">Guardar</button>
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

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let forms = document.querySelectorAll('.form-guardar');

        forms.forEach(formulario => {
            formulario.addEventListener('submit', event => {

                event.preventDefault();
                
                Swal.fire(
                'Guardado',
                '',
                'success',
                )
                setTimeout(() => {
                    formulario.submit();
                }, 1000);
                
            })
        });
    </script>
@endsection
