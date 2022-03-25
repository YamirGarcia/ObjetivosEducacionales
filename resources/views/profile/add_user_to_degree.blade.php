<!-- Modal para asignar usuario a carrera -->
<div class="modal fade" id="modalCarreraUsuario{{$carrera->id}}" >
    <div class="modal-dialog" style="z-index: 4000;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignar Usuarios a Carrera {{$carrera->carrera}}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form action="{{ route('carreras.update', [$carrera->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <h4>Lista de Usuarios</h4>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table>
                    {{-- <label for="carrera">Nombre de la Carrera:</label>
                    <input type="text" class="form-control" name="carrera" style="margin-bottom: 2rem;" value="{{$carrera->carrera}}"> --}}

                    {{-- <label for="planEstudios">Plan de estudios:</label>
                    <input type="text" class="form-control" name="planEstudios" value="{{$carrera->planEstudios}}"> --}}

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary">ACTUALIZAR INFORMACION</button>
                </div>
            </form>
        </div>
    </div>
</div>