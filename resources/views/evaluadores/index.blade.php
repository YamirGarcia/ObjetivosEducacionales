@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="css/estiloTabla.css">
<link rel="stylesheet" type="text/css" href="css/estiloAdicionalRol.css">
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Evaluadores</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow p-3 mb-5 bg-body rounded">

                    <div style="display: inline;">
                        @if ($evaluadores->count()==0)
                        <h1 class="text-center">No existen evaluadores que mostrar</h1>
                        @else
                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr class="table100-head">
                                        <th class="column1" style="display: none;">ID</th>
                                        <th class="column2">Nombre</th>
                                        <th class="column3">Correo</th>
                                        <th class="column4">Empresa</th>
                                        <th class="column5">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($evaluadores as $evaluador)
                                    @if ($evaluador->creadopor == $user_sesion)
                                    
                                    <tr>
                                        <td class="column1" style="display: none;">{{$evaluador->id}}</td>
                                        <td class="column2">{{$evaluador->nombres}}</td>
                                        <td class="column3">{{$evaluador->correo}}</td>
                                        <td class="column4">{{$evaluador->empresa}}</td>
                                        <td class="column5">
                                            {{-- display:inline --}}
                                            <a class="btn btn-info btn-md" style="" href="{{ route('evaluadores.edit', $evaluador->id)}}">Editar</a>
                                            {!! Form::open(['method' => 'DELETE','route' => ['evaluadores.destroy', $evaluador->id],'style'=>'display:inline']) !!}
                                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-md']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $evaluadores->links() !!}
                            </div>
                            
                            
                        </div>
                        
                        @endif
                        <a href="{{route('evaluadores.create')}}" class="btn-flotante">Agregar Evaluador</a>
                    </div>
                </div>
                </div>
        </div>
    </div>
</section>
@endsection