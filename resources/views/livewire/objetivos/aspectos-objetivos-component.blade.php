<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">
                <a style="text-decoration: none; color: #6c757d" href="/carreras">Carreras</a>
                <a style="text-decoration: none; color: #6c757d"
                    href="{{ route('ObjetivoEducacional.show', App\Models\ObjetivoEducacional::find($idObj)->carrera->id) }}">/
                    Objetivos Educacionales</a>
                <a style="text-decoration: none; color: #6c757d"
                    href="{{ route('aspectosObjetivos.show', $idObj) }}">/
                    Aspectos</a>
            </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-body" id="card-b">
                            {{-- {{$cont}} --}}
                            @if (session()->has('message'))
                                {{ session('message') }}
                            @endif
                            @can('crear-aspectosObjetivos')
                                <label for="" class="bg-indigo-100">Agregar Nuevo Aspecto:</label>
                                <div class="mb-2">
                                    <form wire:submit.prevent="guardarAspecto()">
                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text" class="form-control" style="margin-right: 1rem;"
                                                    name="descripcionAspectoObjetivo"
                                                    wire:model='descripcionAspectoObjetivo'>
                                                @error('descripcionAspectoObjetivo')
                                                    <em style="color: red">{{ $message }}</em>
                                                @enderror
                                            </div>
                                            <div class="col-1" style="position: relative; left: -40px ;">
                                                <button type="submit" class="boton-submit">Agregar</button>
                                            </div>
                                        </div>
                                    </form>
                                @endcan
                            </div>
                            @forelse ($aspectos as $aspecto)
                                <div wire:ignore.self class="accordion" id="accordionExample{{ $aspecto->id }}">
                                    <div wire:ignore.self class="card card-accordion">
                                        <div wire:ignore.self class="card-header" id="heading{{ $aspecto->id }}">
                                            <h2 wire:ignore.self class="mb-0" style="display: flex">
                                                <button wire:ignore.self class="btn-acordion" type="button"
                                                    data-toggle="collapse" data-target="#collapse{{ $aspecto->id }}"
                                                    aria-expanded="true" aria-controls="collapse{{ $aspecto->id }}"
                                                    style="text-decoration: none">
                                                    {{ $loop->iteration }}.- {{ $aspecto->nombre }}
                                                </button>
                                                <div wire:ignore.self class="acciones2">
                                                    @can('editar-aspectosObjetivos')
                                                        <a wire:ignore.self href="#" data-toggle="modal"
                                                            data-target="#modalEditarAspecto"
                                                            wire:click="cargarDatosAspecto({{ $aspecto->id }})">
                                                            <div wire:ignore.self class="icon edit-fill">
                                                                <i wire:ignore.self>
                                                                    <svg wire:ignore.self class="svg"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 512 512">
                                                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                                        <path
                                                                            d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z" />
                                                                    </svg>
                                                                </i>
                                                            </div>
                                                        </a>
                                                    @endcan
                                                    {{-- <form wire:prevent.submit="eliminarAspecto({{$aspecto->id}})""> --}}
                                                    @can('borrar-aspectosObjetivos')
                                                        <button wire:ignore.self style="border: none; background: none"
                                                            wire:click="$emit('eliminarAspectoModal', {{ $aspecto->id }})"
                                                            data-toggle="tooltip" data-placement="bottom" title="Eliminar">
                                                            <div wire:ignore.self class="icon trash-fill">
                                                                <i wire:ignore.self>
                                                                    <svg wire:ignore.self class="svg-delete"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512">
                                                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                                        <path
                                                                            d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z" />
                                                                    </svg>
                                                                </i>
                                                            </div>
                                                        </button>
                                                    @endcan
                                                    {{-- <button wire:click="eliminarAspecto({{$aspecto->id}})">Hola</button> --}}
                                                    {{-- </form> --}}
                                                </div>
                                            </h2>
                                        </div>
                                        @can('ver-preguntasObjetivos')
                                            <div wire:ignore.self id="collapse{{ $aspecto->id }}" class="collapse"
                                                aria-labelledby="heading{{ $aspecto->id }}"
                                                data-parent="#accordionExample{{ $aspecto->id }}">
                                                <div wire:ignore.self class="card-body">
                                                    @if ($aspecto->preguntas->count() > 0)
                                                        <table class="tabla-general mb-4">
                                                            <thead>
                                                                <tr class="table100-head">
                                                                    <th class="column1">No.</th>
                                                                    <th class="column2">Pregunta</th>
                                                                    <th class="column3">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($aspecto->preguntas as $preguntaAsp)
                                                                    <tr class="table100-head">
                                                                        <td class="column1">{{ $loop->iteration }}
                                                                        </td>
                                                                        <td class="column2">
                                                                            {{ $preguntaAsp->Pregunta }}</td>
                                                                        <td class="column3">
                                                                            <div class="acciones">
                                                                                @can('editar-preguntasObjetivos')
                                                                                    <a href="#" data-toggle="modal"
                                                                                        data-target="#modalEditarPregunta"
                                                                                        wire:click="cargarDatosPregunta({{ $preguntaAsp->id }})">
                                                                                        <div class="icon edit-fill">
                                                                                            <i>
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    viewBox="0 0 512 512">
                                                                                                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                                                                    <path
                                                                                                        d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z" />
                                                                                                </svg>
                                                                                            </i>
                                                                                        </div>
                                                                                    </a>
                                                                                @endcan
                                                                                @can('borrar-preguntasObjetivos')
                                                                                    <button class="btn-tabla"
                                                                                        wire:click='borrarPregunta({{ $preguntaAsp->id }})'
                                                                                        data-toggle="tooltip"
                                                                                        data-placement="bottom"
                                                                                        title="Eliminar">
                                                                                        <div class="icon trash-fill">
                                                                                            <i>
                                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                    viewBox="0 0 448 512">
                                                                                                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                                                                    <path
                                                                                                        d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z" />
                                                                                                </svg>
                                                                                            </i>
                                                                                        </div>
                                                                                    </button>
                                                                                @endcan
                                                                            </div>
                                                                            {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditarPregunta" wire:click="cargarDatosPregunta({{$preguntaAsp->id}})">Editar</button>
                                                <button class="btn btn-danger" wire:click='borrarPregunta({{$preguntaAsp->id}})'>Borrar</button> --}}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <h2>No Existen Preguntas</h2>
                                                    @endif
                                                    @can('crear-preguntasObjetivos')
                                                        <h4>Agregar Nueva Pregunta:</h4>
                                                        <form wire:submit.prevent="guardarPregunta({{ $aspecto->id }})">
                                                            <div class="row">
                                                                <div class="col-9">
                                                                    <input wire:ignore type="text" class="form-control"
                                                                        style="margin-right: 1rem;" name="Pregunta"
                                                                        wire:model="preguntaNueva">
                                                                </div>

                                                                <div class="col-1"
                                                                    style="position: relative; right: 20px;">
                                                                    <button type="submit"
                                                                        class="boton-submit">Agregar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                            @empty
                                <h2>No existen Aspectos Asignados a Este Objetivo Educacional</h2>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
    </section>
    {{-- </div> --}}

    {{-- MODALES --}}

    {{-- EDITAR ASPECTO --}}
    <div wire:ignore.self class="modal fade" id="modalEditarAspecto" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Aspecto</h5>
                    <button class="btn-tabla" type="button" data-dismiss="modal">
                        <div class="icon trash-fill">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path
                                        d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                                </svg>
                            </i>
                        </div>
                    </button>
                </div>
                <form wire:submit.prevent='guardarDatosAspecto'>
                    <div class="modal-body">
                        <label for="nombre">Nombre:</label>
                        <textarea name="nombre" class="form-control" id="nombre" rows="5" style="resize: none; height: 6rem;"
                            wire:model='nuevaDescripcion' value='{{ $nuevaDescripcion }}'></textarea>

                        {{-- <input type="text" style="visibility: hidden;" value="{{$id}}" name="idObjetivo"> --}}
                    </div>

                    <div class="modal-footer">
                        <div class="col-xs-8 col-sm-12 col-md-15" style="left: -35px">
                            <button type="submit" class="boton-submit"
                                wire:click="$emit('ocultarModalEditarAspecto')">Actualizar</button>
                        </div>
                        {{-- <button type="submit" class="btn btn-primary" wire:click="$emit('ocultarModalEditarAspecto')">ACTUALIZAR INFORMACION</button> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- EDITAR PREGUNTA --}}
    <div wire:ignore.self class="modal fade" id="modalEditarPregunta" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Pregunta</h5>
                    <button class="btn-tabla" type="button" data-dismiss="modal">
                        <div class="icon trash-fill">
                            <i>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path
                                        d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
                                </svg>
                            </i>
                        </div>
                    </button>
                </div>
                <form wire:submit.prevent='guardarDatosPregunta'>
                    <div class="modal-body">
                        <label for="Pregunta">Pregunta:</label>
                        <textarea name="Pregunta" class="form-control" id="nombre" rows="5" style="resize: none; height: 6rem;"
                            wire:model='preguntaEditar' value="{{ $textoPregunta }}"></textarea>
                    </div>

                    <div class="modal-footer">
                        <div class="col-xs-8 col-sm-12 col-md-15" style="left: -35px">
                            <button type="submit" class="boton-submit">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Livewire.on('eliminarAspectoModal', id => {
                console.log('Evento eliminar aspecto modal');
                Swal.fire({
                    title: '¿Está seguro de borrar este aspecto',
                    text: "¡Se borrará el aspecto y sus preguntas relacionadas!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('objetivos.aspectos-objetivos-component', 'eliminarAspecto', id)
                        Swal.fire(
                            'Borrado',
                            '',
                            'success'
                        )
                    }
                })
            });

            Livewire.on('ocultarModalEditarAspecto', () => {
                $('#modalEditarAspecto').modal('hide');
                $('.card-b').click();
                console.log('Editamos');
            })
        </script>
    @endpush

</div>
