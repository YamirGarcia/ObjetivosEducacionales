<!-- Modal para consultar los atributos de una carrera -->
<div class="modal fade" id="modalAtributosCarrera{{$carrera->id}}" >
    <div class="modal-dialog modal-lg" style="z-index: 4000;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atributos de: {{$carrera->carrera}}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <form action="{{ route('carreras.update', [$carrera->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <h4>Lista de Atributos</h4>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Check</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($carrera->atributos as $atributo)
                          <tr>
                              <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$atributo->descripcion}}</td> 
                              <td>
                                  
                                {!! Form::open(['method' => 'DELETE', 'route' => ['eliminarAtributo', $atributo->id],'style'=>'margin: 4px']) !!}
                                {!! Form::submit('Borrar', ['class' => 'btn btn-outline-danger']) !!}
                                {!! Form::close() !!}
                            </td>     
                          </tr>
                            @endforeach
                        </tbody>
                      </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">CERRAR</button>
                    {{-- <button type="submit" class="btn btn-primary">ACTUALIZAR INFORMACION</button> --}}
                </div>
            </form>
        </div>
    </div>
</div>