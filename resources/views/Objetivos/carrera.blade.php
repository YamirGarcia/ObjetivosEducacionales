@extends('layouts.app')

@section('estilos')

<link rel="stylesheet" type="text/css" href="css/estiloAdicionalRol.css">
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
                        <table class="table table-striped mt-2">
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
                                    
                                        <button class="badge bg-info text-dark" data-toggle="modal" data-target="#modalCarreraUsuario{{$carrera->id}}">
                                            Número
                                          </button>
                                    </td>
                                    <td>
                                        <div class="submenu">
                                        @can('borrar-carrera')
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['carreras.destroy', $carrera->id],'style'=>'margin: 4px']) !!}
                                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-md']) !!}
                                        {!! Form::close() !!}
                                        @endcan
                                        @can('editar-carrera')
                                        <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalEditar{{$carrera->id}}">Editar</button>
                                        @endcan
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
    @endforeach

    @include('profile.añadir_carrera')

    @foreach ($carreras as $carrera)
        @include('profile.add_user_to_degree')  
    @endforeach

    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div> --}}
    
@endsection