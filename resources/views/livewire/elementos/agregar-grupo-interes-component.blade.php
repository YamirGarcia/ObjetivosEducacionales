<div class="form-group">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    {{-- <label for="">Componente</label>
    <h2>Hola</h2> --}}
    <label for="">Grupo de Interes</label>
    <div class="" style="display: flex">
        <select name="idGrupoDeInteres" class="form-control mr-2" style="width: 80%">
            @foreach ($grupos as $grupo)
            <option  value="{{$grupo->id}}">{{$grupo ->nombre}}</option>
            @endforeach
        </select>
        {{-- <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar</button> --}}
        <button type="button" href="" class="btn btn-info" style="bottom:120px;" data-toggle="modal" data-target="#modalGrupoInteres" >Grupos de Interes</button>
    </div>
    

    <!-- Button trigger modal -->

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}
</div>





