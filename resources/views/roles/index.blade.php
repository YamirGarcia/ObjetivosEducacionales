@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="css/estiloTablaRolesIndex.css">
<link rel="stylesheet" type="text/css" href="css/botonFlotante.css">
<link rel="stylesheet" type="text/css" href="css/iconos.css">
@endsection

@section('content')
    <input type="text" class="form-control" id="texto" placeholder="Buscar..." style="position: relative; top: 160px; z-index: 2000; width: 200px; margin-left: 48px">
    <div id="resultados">
        @include('roles.tablaindex')
    </div>
@endsection

@section('scripts')
    <script>
        // Script para poder buscar cada que apriete una tecla "keyup"
        window.addEventListener("load",function(){
            document.getElementById("texto").addEventListener("keyup", function(){
                    fetch(`/buscador?texto=${document.getElementById("texto").value}`,{
                        method: 'get'
                    })
                    .then(response => response.text() )
                    .then(html => {
                        document.getElementById("resultados").innerHTML = html
                    })
            })
        })
    </script>
@endsection