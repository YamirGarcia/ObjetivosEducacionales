<!-- pantalla y atemrinada emilio -->
@extends('layouts.app')

@section('estilos')
    <link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
    <link rel="stylesheet" type="text/css" href="/css/estilosGenerales.css">
    <link rel="stylesheet" type="text/css" href="/css/estilofondo.css">
    <link rel="stylesheet" type="text/css" href="/css/botonFlotante.css">
    <link rel="stylesheet" type="text/css" href="/css/iconos.css">
    <link rel="stylesheet" type="text/css" href="/css/estiloTablaObjetivos.css">
    <link rel="stylesheet" type="text/css" href="/css/badges.css">
@endsection

@section('content')

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">
                <a style="text-decoration: none; color: #6c757d" href="/carreras">Carreras</a>
                <a style="text-decoration: none; color: #6c757d" href="{{ route('ObjetivoEducacional.show', $id) }}">/
                    Objetivos Educacionales</a>
            </h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        @if ($envio->count() == 0)
                            <h1 class="text-center">No Existen Objetivos Educacionales</h1>
                        @else
                            <div class="card-body">
                                <div class="row">
                                    <table class="tabla-general">
                                        <thead>
                                            <tr class="table100-head">
                                                <th class="column1">#</th>
                                                <th class="column2">Descripción</th>
                                                <th class="column5">Meta</th>
                                                <th class="column4">Propiedades</th>
                                                <th class="column3">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($envio as $objetivo)
                                                <tr class="table100-head">
                                                    <td class="column1">{{ $loop->iteration }}</td>
                                                    <td class="column2">{{ $objetivo->descripcion }}</td>
                                                    <td class="column5">{{ $objetivo->meta }}</td>
                                                    <td class="column4">
                                                        <div>
                                                            <button class="chip primary" data-toggle="modal"
                                                                data-target="#modalAspectosObjetivos{{ $objetivo->id }}">
                                                                <span>
                                                                    Aspectos: {{ $objetivo->aspectos->count() }}
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td class="column3">
                                                        <div class="acciones">
                                                            @can('editar-objetivos')
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#modalEditar{{ $objetivo->id }}">
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
                                                            @can('borrar-objetivos')
                                                                <form
                                                                    action="{{ url('ObjetivoEducacional', [$objetivo->id]) }}"
                                                                    method="POST" class="formulario-eliminar">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    {{ method_field('DELETE') }}
                                                                    @if (App\Models\Carrera::find($id)->noBorrar == false)
                                                                        <button type="submit"
                                                                            style="border: none; background: none"
                                                                            data-toggle="tooltip" data-placement="bottom"
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
                                                                    @endif
                                                                </form>
                                                            @endcan
                                                            {{-- <form  action="{{route ('aspectosObjetivos.show', [$objetivo->id])}}" method="GET"> --}}
                                                            @can('ver-aspectosObjetivos')
                                                                <form
                                                                    action="{{ route('aspectosObjetivos.show', [$objetivo->id]) }}"
                                                                    method="GET">
                                                                    <button type="submit" class="btn-tabla"
                                                                        data-toggle="tooltip" data-placement="bottom"
                                                                        title="Aspectos">
                                                                        <div class="icon search-fill">
                                                                            <i>
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 512 512">
                                                                                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                                                    <path
                                                                                        d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM64 256C64 238.3 78.33 224 96 224H480C497.7 224 512 238.3 512 256C512 273.7 497.7 288 480 288H96C78.33 288 64 273.7 64 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z" />
                                                                                </svg>
                                                                            </i>
                                                                        </div>
                                                                    </button>
                                                                </form>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                        @can('crear-objetivos')
                            <a href="#" class="btn-flotante" data-toggle="modal" data-target="#modalAgregar">Agregar
                                Objetivo</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal para agregar objetivos -->
    <div class="modal fade" id="modalAgregar" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Objetivo Educacional</h5>
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
                <form action="{{ url('/ObjetivoEducacional', []) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="carrera">Objetivo Educacional:</label>
                        <textarea type="text" class="form-control" name="descripcion" rows="5" style="resize: none; height: 6rem;"
                            autofocus required></textarea>
                        <label for="meta">Meta</label>
                        <input type="number" class="form-control" name="meta" max="5" min="0" step="0.1">
                        <input type="text" class="form-control" name="idCarrera"
                            style="margin-bottom: 2rem; visibility: hidden;" value={{ $id }}></textarea>
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

    <!-- Modal para editar objetivos -->
    @foreach ($envio as $objetivo)
        <div class="modal fade" id="modalEditar{{ $objetivo->id }}" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Objetivo Educacional</h5>
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
                    <form action="{{ url('ObjetivoEducacional/' . $objetivo->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="modal-body">
                            <label for="carrera">Objetivo Educacional:</label>
                            <textarea type="text" class="form-control" name="descripcion" rows="5"
                                style="resize: none; height: 6rem;" required>{{ $objetivo->descripcion }}</textarea>
                            <label for="carrera">Meta</label>
                            <input type="number" class="form-control" name="meta" max="5" min="0" step="0.1" value="{{$objetivo->meta}}">
                            <input type="text" class="form-control" name="idCarrera"
                                style="margin-bottom: 2rem; visibility: hidden;" value={{ $id }}>

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

        <!-- Modal para consultar los aspectos de un objetivo -->
        <div class="modal fade" id="modalAspectosObjetivos{{ $objetivo->id }}">
            <div class="modal-dialog modal-lg" style="z-index: 4000;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aspectos de: {{ $objetivo->descripcion }}</h5>
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
                    <div class="modal-body">
                        <h4>Lista de Aspectos</h4>
                        <table>
                            <thead>
                                <tr class="table100-head-modal">
                                    <th class="column1-modal">#</th>
                                    <th class="column2-modal-objetivos-atributos">Aspecto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($objetivo->aspectos as $aspecto)
                                    <tr>
                                        <td class="column1-modal"">{{ $loop->iteration }}</td>
                                                <td class="   column2-modal-objetivos-atributos">{{ $aspecto->nombre }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let forms = document.querySelectorAll('.formulario-eliminar');

        forms.forEach(formulario => {
            formulario.addEventListener('submit', event => {

                event.preventDefault();
                Swal.fire({
                    title: '¿Está seguro de borrar este Objetivo Educacional',
                    text: "¡Se borrará el objetivo, sus aspectos y sus preguntas relacionadas!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // 
                        Swal.fire(
                            'Borrado',
                            '',
                            'success'
                        )
                        formulario.submit();
                    }
                })
            })
        });
    </script>
@endsection
