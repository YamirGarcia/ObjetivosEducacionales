@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="css/estiloTablaRolesIndex.css">
<link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
<link rel="stylesheet" type="text/css" href="css/iconos.css">
@livewireStyles
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
                        {{-- @if ($roles->count()==0)
                        <h1 style="margin-top: 30px">No existen roles creados por mostrar</h1> 
                        @else --}}
                        @livewire('roles.tabla-roles-component')
                    <div class="pagination justify-content-end">
                        {!! $roles->links() !!}
                    </div>
                    {{-- @endif --}}
                </div>
                
                <a href="{{route('roles.create')}}" class="btn-flotante">Agregar Rol</a>
            </div>
        </div>
    </div>

</section>
@livewireScripts
@endsection

@section('scripts')
    
@endsection