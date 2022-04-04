@extends('layouts.app')
@section('estilos')

<link rel="stylesheet" type="text/css" href="css/estiloAdicionalUsuario.css">
<link rel="stylesheet" type="text/css" href="css/estiloTabla.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Usuarios</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div >
                    <div >
                        <!-- estos div es para conservar las clases y ver como funciona -->
                    <!-- <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body"> -->
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <th class="column1" style="display: none;">ID</th>
                                    <th class="column2">Nombre</th>
                                    <th class="column3">Correo</th>
                                    <th class="column4">Rol</th>
                                    <th class="column5">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                @if ($usuario->creadopor == $user_sesion)
                                
                                <tr>
                                    <td class="column1" style="display: none;">{{$usuario->id}}</td>
                                    <td class="column2">{{$usuario->name}}</td>
                                    <td class="column3">{{$usuario->email}}</td>
                                    <td class="column4">
                                        @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolName)
                                        <h5>
                                                <span class="badge badge-dark">{{$rolName}}</span>
                                        </h5>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td class="column5">
                                        {{-- display:inline --}}
                                        <a class="btn btn-info btn-md" style="" href="{{ route('usuarios.edit', $usuario->id)}}">Editar</a>
                                        {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-md']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                        </div>
                    </div>
                    <a href="{{route('usuarios.create')}}" class="btn-flotante">Agregar Usuario</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection