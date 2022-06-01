<!-- Modal para asignar usuario a carrera -->
<div class="modal" id="modalCarreraUsuario{{$carrera->id}}" >
  <div class="modal-dialog modal-lg " style="z-index: 4000;">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Asignar Usuarios a {{$carrera->carrera}}</h5>
              <button class="btn-tabla" type="button" data-dismiss="modal">
                <div class="icon trash-fill">
                  <i> 
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/></svg>
                  </i>
              </div>
              </button>
          </div>
          <form action="{{ route('agregarUser', [$carrera->id]) }}" method="POST">
              {{-- @method('PATCH') --}}
              @csrf
              <div class="modal-body">
                  <h4>Lista de Usuarios Asignados</h4>
                  <div class="container-table100">

                    <table>
                      <thead>
                        <tr class="table100-head-modal">
                          <th class="column1-modal">#</th>
                          <th class="column2-modal">Nombre</th>
                          <th class="column3-modal">Apellidos</th>
                          <th class="column4-modal">Correo</th>
                          <th class="column5-modal">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($carrera->usuarios as $usuario)
                        <tr class="table100-head-modal">
                          <td class="column1-modal"> {{$loop->iteration}}</td>
                          <td class="column2-modal">{{$usuario->name}} 
                            @if (App\Models\Carrera::find($carrera->id)->creadopor == $usuario->id)
                                <svg xmlns="http://www.w3.org/2000/svg" width='10' heigth='10'  viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"/></svg>
                            @endif
                          </td>
                          <td class="column3-modal">{{$usuario->apellido}}</td>
                          <td class="column4-modal">{{$usuario->email}}</td>
                          <td class="column5-modal">
                            <div class="acciones">
                              @if (Illuminate\Support\Facades\Auth::user()->id == $carrera->creadopor || Illuminate\Support\Facades\Auth::user()->rol == "Administrador")    
                              <form action="{{route('eliminarUsuarioCarrera', [$usuario->id, $carrera->id])}}" method="POST">
                                @csrf
                                <button type="submit" style="border: none; background: none">
                                  <div class="icon trash-fill">
                                    <i>
                                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/></svg>
                                    </i>
                                  </div>
                                </button>
                              </form>
                              @endif
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                    <div class="container" style="height: 10px; padding: 15px 0 0 0; background: none;">
                      <h3>Agregar Usuario:</h3>
                      <select name="carreraAtributo" id="carreraAtributo" class="form-control">
                        <option selected >Lista de Usuarios</option>
                        @foreach ($usuarios as $usuario)                    
                          @if ((!($carrera->usuarios->find($usuario->id)) && ($usuario->rol !='Evaluador')) || (\Illuminate\Support\Facades\Auth::user()->rol == "Administrador" && $usuario->rol !='Evaluador'))
                          <option value="{{$usuario->id}}">{{$usuario->name}} {{$usuario->apellido}}</option>
                          @endif
                        @endforeach
                      </select>
                    </div> 
              </div>
              <input type="text" name="carrera" id="carrera" value="{{$carrera->id}}" hidden>
              <div class="modal-footer">
                <div class="col-xs-8 col-sm-12 col-md-15" style="left: -35px">
                  <button type="submit" class="boton-submit">Guardar</button>
              </div>
              </div>
          </form>
      </div>
  </div>
</div>