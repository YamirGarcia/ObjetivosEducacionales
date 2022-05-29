@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="css/estiloTablaRolesIndex.css">
<link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
<link rel="stylesheet" type="text/css" href="css/iconos.css">
@livewireStyles
@endsection

@section('content')

@livewire('roles.tabla-roles-component')

@livewireScripts
@endsection

@section('scripts')
    
@endsection