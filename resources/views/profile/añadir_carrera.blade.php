<div id="modalAgregar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">AGREGAR CARRERA</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form action="{{ route('carreras.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="carrera">Nombre de la Carrera:</label>
                    <input type="text" class="form-control" name="carrera" style="margin-bottom: 2rem;">

                    <label for="planEstudios">Plan de estudios:</label>
                    <input type="text" class="form-control" name="planEstudios">

                    <input type="text" name="idCarrera" id="idCarrera" value="{{$carrera->id}}" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                </div>
            </form>
        </div>
    </div>
</div>