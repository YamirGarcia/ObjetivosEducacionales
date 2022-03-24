@extends('layouts.app')

@section('estilos')

<link rel="stylesheet" type="text/css" href="css/estiloAdicionalRol.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Roles</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        @if ($roles->count()==0)
                            <h1>No existen roles creados por mostrar</h1> 
                        @else
                        @can('crear-rol')
                        <!-- <a class="btn btn-warning" href="{{route('roles.create')}}">Nuevo</a> -->
                        @endcan
                        <table class="table mt-2">
                            <thead>
                                <th style="color: #fff;">Rol</th>
                                <th style="color: #fff;"></th>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td style="display: flex; flex-direction: row-reverse; ">
                                        <div class="submenu" style="display: flex; flex-direction: row-reverse; ">
                                        @can('borrar-rol')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id],'style'=>'margin: 4px']) !!}
                                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger hide-menu']) !!}
                                        {!! Form::close() !!}
                                        @endcan
                                        @can('editar-rol')
                                        {!! Form::open(['method' => 'GET', 'route' => ['roles.edit', $role->id],'style'=>'margin: 4px']) !!}
                                        {!! Form::submit('Editar', ['class' => ' btn btn-primary hide-menu']) !!}
                                        {!! Form::close() !!}
                                        @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>

                    <a href="{{route('roles.create')}}" class="btn-flotante">Agregar Rol</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection