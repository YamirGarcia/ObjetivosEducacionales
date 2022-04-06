<link rel="stylesheet" type="text/css" href="css/estiloAdicionalobjetivos.css">
<a href="" class="btn-flotante" style="bottom:120px;" data-toggle="modal" data-target="#modalGrupoInteres" >Grupos de Interes</a>

<div class="modal fade" id="modalGrupoInteres" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Grupos de Interes</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            
                <div class="modal-body">
                <table class="table table-striped mt-2 text-center">
                                <thead style="background-color: #6777ef">
                                    <tr>
                                        <th style="color: #fff;">Nombre del Grupo</th>
                                        <th style="color: #fff;">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $envio as $grupoI)
                                    <tr>
                                        <td>{{$grupoI->nombre}}</td>
                                        <td>
                                        <!-- <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalAgregar">Agregar</button> --> 
                                            <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#modalEditar{{$grupoI->id}}">Editar</button>
                                            <form method="POST" action="{{url ('GrupodeInteres/'.$grupoI->id)}}">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <input type="submit" onclick="return confirm('¿Seguro que deseas borrar?')" value="Borrar" class="btn btn-danger btn-md">
                                            </form>
                                           
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregar">Agregar</button>
                </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AGREGAR Grupo de Interes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url ('/GrupodeInteres')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="carrera">Nombre del Grupo:</label>
                    <input type="text" class="form-control" name="nombre" style="margin-bottom: 2rem;">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                </div>
            </form>
        </div>
    </div>
</div>


@foreach( $envio as $grupoI)
<div class="modal fade" id="modalEditar{{$grupoI->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Grupo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url ('GrupodeInteres/'.$grupoI->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <label for="carrera">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" style="margin-bottom: 2rem;" value="{{$grupoI->nombre}}">
                    <input type="text" class="form-control" name="id" style="margin-bottom: 2rem; visibility: hidden;" value="{{$grupoI->id}}">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary">ACTUALIZAR INFORMACION</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach