<!-- Modal para editar carrera -->
<div class="modal fade" id="modalEditar{{$carrera->id}}" >
    <div class="modal-dialog" style="z-index: 4000;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ACCESO RÁPIDO</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form action="{{ route('editarCarrera', ['id' => $carrera->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <label for="carrera">Nombre de la Carrera:</label>
                    <input type="text" class="form-control" name="carrera" style="margin-bottom: 2rem;" value="{{$carrera->carrera}}">

                    <label for="planEstudios">Plan de estudios:</label>
                    <input type="text" class="form-control" name="planEstudios" value="{{$carrera->planEstudios}}">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary">ACTUALIZAR INFORMACION</button>
                </div>
            </form>
        </div>
    </div>
</div>