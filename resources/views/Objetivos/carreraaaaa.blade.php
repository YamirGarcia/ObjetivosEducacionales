@extends('layouts.app')

@section('estilos')

<link rel="stylesheet" type="text/css" href="css/estiloCarreraPrincipal.css">
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> -->

@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Carreras</h3>
    </div>
    <div class="">

    

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="Tabla__filas">
                                @foreach ($carreras as $carrera)

                                <div class="Tabla__filaregistro">
                                    <div class="Tabla__registroCarrera">
                                        <p>{{ $carrera->carrera }}</p>
                                    </div>
                                    <div class="Tabla__registroPlan">
                                        <p>
                                            {{ $carrera->planEstudios }}
                                        </p>
                                    </div>
                                    <div class="Tabla__menucont" id="mas">
                                        <img id="btnmas" class="btnmenumas" src="img/option.png" alt="">
                                    </div>
                                    <div class="Tabla__registroMas">
                                        @can('editar-carrera')
                                        <div class="Tabla__menucontvv">
                                            <button class="Tabla__editar" data-toggle="modal" data-target="#modalEditar{{$carrera->id}}">Editar</button>
                                            @include('profile.editar_carrera')
                                        </div>
                                        @endcan
                                        <!-- <button class="btn btn-primary">Editar</button> -->
                                        @can('borrar-carrera')
                                        <form action="{{ route('eliminarCarrera', ['id' => $carrera->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <div class="Tabla__menucontvv">
                                                <button class="Tabla__eliminar">Eliminar</button>
                                            </div>
                                        </form>
                                        @endcan
                                        <form action="#">
                                            @csrf
                                            <div class="Tabla__menucontvv">
                                                <button>Objetivos Educacionales</button>

                                            </div>
                                        </form>
                                        <form action="#">
                                            @csrf
                                            <div class="Tabla__menucontvv">
                                                <button>Atributos</button>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            @can('crear-carrera')
                            <a href="#" class="btn-flotante" data-toggle="modal" data-target="#modalAgregar">Agregar Carrera</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal para editar carrera -->











@include('profile.añadir_carrera')

<script>
    let mostrarmenucont = document.querySelectorAll(".Tabla__menucont");

    mostrarmenucont.forEach(mostrarmenucont => {
        mostrarmenucont.addEventListener('click', () => {
            mostrarmenucont.classList.toggle("active");
        })
    });

    let ocultarmenucont = document.querySelectorAll(".contenido");

    mostrarmenucont.forEach(menucont => {
        mostrarmenucont.addEventListener('click', () => {
            mostrarmenucont.classList.toggle("active");
        })
    });
</script>
@endsection