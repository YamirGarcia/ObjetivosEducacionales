<!-- Modal para asignar usuario a carrera -->
<div class="modal fade" id="modalCarreraUsuario{{$carrera->id}}" >
    <div class="modal-dialog modal-lg" style="z-index: 4000;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignar usuarios de la carrera {{$carrera->carrera}}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form action="{{ route('agregarUser', [$carrera->id]) }}" method="POST">
                {{-- @method('PATCH') --}}
                @csrf
                <div class="modal-body">
                    <h4>Lista de Usuarios</h4>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Correo</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($carrera->usuarios as $usuario)
                          <tr>
                              <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$usuario->name}}</td>
                              <td>{{$usuario->apellido}}</td>
                              <td>{{$usuario->email}}</td>
                            </tr>
                            @endforeach
                          
                        </tbody>
                      </table>
                      <div class="container">
                        <h3>Agregar Usuario:</h3>
                        <select name="carreraAtributo" id="carreraAtributo" class="form-control">
                          <option selected >Lista de Usuarios</option>
                          @foreach ($usuarios as $usuario)
                          <option value="{{$usuario->id}}">{{$usuario->name}} {{$usuario->apellido}}</option>
                          @endforeach
                        </select>
                      </div> 
                </div>
                <input type="text" name="carrera" id="carrera" value="{{$carrera->id}}" hidden>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary">ACTUALIZAR USUARIOS</button>
                </div>
            </form>
        </div>
    </div>
</div>