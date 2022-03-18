@extends('Objetivos.menu')

@section('estilos')

<link rel="stylesheet" type="text/css" href="css/estiloCarreraPrincipal.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@endsection

@section('content')

<div class="contenido">

<div class="Tabla">
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
                    <div class="Tabla__menucont">
                        <i>mas</i>
                    </div>
                    <div class="Tabla__registroMas">
                        <form action="#" method="GET">
                            @csrf
                            <div class="Tabla__menucontvv">
                                <button class="Tabla__editar">Editar</button>
                                
                            </div>
                            <!-- <button class="btn btn-primary">Editar</button> -->
                        </form>
                        <form action="{{ route('eliminarCarrera', ['id' => $carrera->id]) }}" method="POST">
                             @method('DELETE')
                             @csrf
                             <div class="Tabla__menucontvv">
                                <button class="Tabla__eliminar" >Eliminar</button>
                                
                            </div>
                         </form>
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
        </div>
    </div>
    


</div>
<a href="#" class="btn-flotante" data-bs-toggle="modal" data-bs-target="#modalAgregar">AGREGAR CARRERA</a>

 <!-- Modal -->
 <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AGREGAR CARRERA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('carrera') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="carrera" >Nombre de la Carrera:</label>
                    <input type="text" class="form-control" name="carrera" style="margin-bottom: 2rem;">
    
                    <label for="planEstudios" >Plan de estudios:</label>
                    <input type="text" class="form-control" name="planEstudios">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                </div>
            </form>
            </div>
        </div>
    </div>


@endsection
