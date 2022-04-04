@extends('layouts.app')
@section('estilos')

<link rel="stylesheet" type="text/css" href="css/estiloAdicionalUsuario.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Usuarios</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    @if ($usuarios->count() == 0)
                        <h1 class="text-center">No existen usuarios que mostrar</h1> 
                    @else
                        
                    
                    <div class="card-body">
                        <table class="table table-striped mt-2 text-center">
                            <thead style="background-color: #6777ef;">
                                <th style="display: none;">ID</th>
                                <th style="color: #fff;">Nombre</th>
                                <th style="color: #fff;">Correo</th>
                                <th style="color: #fff;">Rol</th>
                                <th style="color: #fff;">Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                @if ($usuario->creadopor == $user_sesion)
                                
                                <tr>
                                    <td style="display: none;">{{$usuario->id}}</td>
                                    <td>{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>
                                        @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolName)
                                        <h5>
                                                <span class="badge badge-dark">{{$rolName}}</span>
                                        </h5>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
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
                    @endif
                    <a href="{{route('usuarios.create')}}" class="btn-flotante">Agregar Usuario</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection