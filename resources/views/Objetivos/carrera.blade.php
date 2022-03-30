@extends('layouts.app')

@section('estilos')

<link rel="stylesheet" type="text/css" href="css/estiloAdicionalRol.css">
<style>
    .checkbox-lg .custom-control-label::before, 
    .checkbox-lg .custom-control-label::after {
    top: .8rem;
    width: 1.55rem;
    height: 1.55rem;
    }

    .checkbox-lg .custom-control-label {
    padding-top: 13px;
    padding-left: 6px;
    }
</style>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Carreras</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    @if ($carreras->count()==0)
                        <h1 class="text-center">No existen carreras que mostrar</h1> 
                    @else
                            
                        
                    <div class="card-body">
                        
                        @can('crear-carrera')
                        <!-- <a class="btn btn-warning" href="{{route('roles.create')}}">Nuevo</a> -->
                        @endcan
                        <table class="table table-striped mt-2 text-center">
                            <thead style="background-color: #6777ef">
                                <th style="color: #fff;">Carrera</th>
                                <th style="color: #fff;">Plan de estudios</th>
                                <th style="color: #fff;">Propiedades</th>
                                <th style="color: #fff;"></th>
                            </thead>
                            <tbody>
                                @foreach($carreras as $carrera)
                                <tr>
                                    <td>{{$carrera->carrera}}</td>
                                    <td>{{$carrera->planEstudios}}</td>
                                    {{-- td style="display: flex; flex-direction: row-reverse; " --}}
                                    {{-- style="display: flex; flex-direction: row-reverse; " --}}
                                    <td>
                                    
                                        <button class="badge bg-info text-dark mr-2" data-toggle="modal" data-target="#modalCarreraUsuario{{$carrera->id}}">
                                            Usuarios: {{$carrera->usuarios->count()}}
                                        </button>
                                        <button class="badge bg-success text-dark mr-2" data-toggle="modal" data-target="#modalAtributosCarrera{{$carrera->id}}">
                                            Atributos: {{$carrera->atributos->count()}}
                                        </button>
                                        <button class="badge bg-primary text-dark mr-2" data-toggle="modal" data-target="#modalObjetivosCarrera{{$carrera->id}}">
                                            Objetivos: {{$carrera->objetivos->count()}}
                                        </button>
                                    </td>
                                    <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            Opciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @can('borrar-carrera')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['carreras.destroy', $carrera->id],'style'=>'margin: 4px; color:red;']) !!}
                                            {!! Form::submit('Borrar', ['class' => 'dropdown-item']) !!}
                                            {!! Form::close() !!}
                                            @endcan
                                            @can('editar-carrera')
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEditar{{$carrera->id}}" style="font-size: 1rem; padding-left: 1.8rem">Editar</a>
                                            @endcan
                                            {!! Form::open(['method' => 'GET', 'route' => ['ObjetivoEducacional.show', $carrera->id],'style'=>'margin: 4px']) !!}
                                            {!! Form::submit('Objetivos Educacionales', ['class' => 'dropdown-item']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                        </div>
                                        <div class="submenu">
                                            
                                            
                                         </div>

                                        
                                    </td>
                                </tr>   
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-end">
                            {!! $carreras->links() !!}
                        </div>
                    </div>
                    @endif
                    @can('crear-carrera')
                        <a href="#" class="btn-flotante" data-toggle="modal" data-target="#modalAgregar">Agregar Carrera</a>
                        @endcan
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    @foreach ($carreras as $carrera)
        @include('profile.editar_carrera')  
        @include('profile.add_user_to_degree')
        @include('profile.atributos_carrera')  
        @include('profile.objetivos_carrera')
    @endforeach

    @include('profile.añadir_carrera')

    
@endsection