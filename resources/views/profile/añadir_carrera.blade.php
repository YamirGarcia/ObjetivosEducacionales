<div id="modalAgregar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Carrera</h5>
                <button class="btn-tabla" type="button" data-dismiss="modal">
                    <div class="icon trash-fill">
                      <i> 
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
                      </i>
                  </div>
                  </button>
            </div>
            <form action="{{ route('carreras.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label for="carrera">Nombre de la Carrera:</label>
                    {{-- <input type="text" class="form-control" name="carrera" style="margin-bottom: 2rem;"> --}}
                    <select class="form-control" name="carrera" style="margin-bottom: 2rem;">

                        <option value="Administración">Ingenieria en Administración</option>
                        <option value="Bioquímica">Ingenieria en Bioquímica</option>
                        <option value="Contador Público">Ingenieria en Contador Público</option>
                        <option value="Eléctrica">Ingenieria en Eléctrica</option>
                        <option value="Electrónica">Ingenieria en Electrónica</option>
                        <option value="Gestión Empresarial">Ingenieria en Gestión Empresarial</option>
                        <option value="Industrial">Ingenieria en Industrial</option>
                        <option value="Materiales">Ingenieria en Materiales</option>
                        <option value="Mecánica">Ingenieria en Mecánica</option>
                        <option value="Mecatrónica">Ingenieria en Mecatrónica</option>
                        <option value="Sistemas Computacionales">Ingenieria en Sistemas Computacionales</option>
                        <option value="TICS">Ingenieria en TICS</option>

                    </select>

                    <label for="planEstudios">Plan de Estudios:</label>
                    <input type="text" class="form-control" name="planEstudios">

                </div>
                <div class="modal-footer">
                    <div class="col-xs-8 col-sm-12 col-md-15" style="left: -35px">
                        <button type="submit" class="boton-submit">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>