<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    {{-- <h4>{{ $rol }}</h4> --}}
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">
                <a style="text-decoration: none; color: #6c757d" href="/usuarios">Usuarios </a>
            </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            {{--  --}}
                            <div class="row mb-4">
                                <div style="display: flex">
                                    <div class="form__select">
                                        {{-- <h4>{{$rol}}</h4> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="24"
                                            height="24" style="fill: #000">
                                            <path
                                                d="M3.853 54.87C10.47 40.9 24.54 32 40 32H472C487.5 32 501.5 40.9 508.1 54.87C514.8 68.84 512.7 85.37 502.1 97.33L320 320.9V448C320 460.1 313.2 471.2 302.3 476.6C291.5 482 278.5 480.9 268.8 473.6L204.8 425.6C196.7 419.6 192 410.1 192 400V320.9L9.042 97.33C-.745 85.37-2.765 68.84 3.854 54.87L3.853 54.87z" />
                                        </svg>
                                        <select class="form-control" wire:model='rol'>
                                            <option value="" selected>Todos los roles</option>
                                            @foreach ($roles as $rol)
                                                @if ($rol != 'Evaluador')
                                                    <option value="{{ $rol }}">{{ $rol }}</option>    
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <button wire:click='limpiar' class="btn-clean" wire:click='prueba'
                                            data-toggle="tooltip" data-placement="bottom" title="Limpiar">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="24"
                                                height="24" style="fill: #fff">
                                                <path
                                                    d="M224 0H336C362.5 0 384 21.49 384 48V256H0V48C0 21.49 21.49 0 48 0H64L96 64L128 0H160L192 64L224 0zM384 288V320C384 355.3 355.3 384 320 384H256V448C256 483.3 227.3 512 192 512C156.7 512 128 483.3 128 448V384H64C28.65 384 0 355.3 0 320V288H384zM192 464C200.8 464 208 456.8 208 448C208 439.2 200.8 432 192 432C183.2 432 176 439.2 176 448C176 456.8 183.2 464 192 464z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="buscador">
                                        <form action="">
                                            <input wire:model="search" type="search" required>
                                            <i class="fa fa-search fa-vc"></i>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if ($usuarios->count() == 0)
                                @if ($search)
                                    <h1 class="text-center">
                                        Sin Resultados
                                    </h1>
                                @else
                                    <h1 class="text-center">No Existen Usuarios Asignados
                                    </h1>
                                @endif
                            @else
                                <table>
                                    <thead>
                                        <tr class="table100-head">
                                            <th class="column1">#</th>
                                            <th class="column2">
                                                <button class="bg-transparent" style="border: none"
                                                    wire:click="sortable('name')">
                                                    <span style="color: white"> Nombre </span>
                                                    <span class="fa fa{{ $campo === 'name' ? $icon : '-circle' }}"
                                                        style="color: white"></span>
                                                </button>
                                            </th>
                                            <th class="column3">
                                                <button class="bg-transparent" style="border: none"
                                                    wire:click="sortable('email')">
                                                    <span style="color: white"> Correo </span>
                                                    <span class="fa fa{{ $campo === 'email' ? $icon : '-circle' }}"
                                                        style="color: white"></span>
                                                </button>
                                            </th>
                                            <th class="column4">
                                                Rol
                                            </th>
                                            <th class="column5">
                                                Carreras Asignadas
                                            </th>
                                            <th class="column4">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                            @if ($usuario->creadopor == $user_sesion || $rolUsuario == 'Administrador')
                                                <tr class="table100-head">
                                                    <td class="column1">{{ $loop->iteration }}</td>
                                                    <td class="column2">{{ $usuario->name }}</td>
                                                    <td class="column3">{{ $usuario->email }}</td>
                                                    <td class="column4">
                                                        {{-- @if (!empty($usuario->getRoleNames()))
                                                            @foreach ($usuario->getRoleNames() as $rolName) 
                                                                <h5> --}}
                                                        <span class="badge badge-dark"
                                                            wire:click='mostrarPermisos({{ $usuario->id }})'
                                                            data-toggle="modal" data-target="#modalUsuarioPermisos">
                                                            {{ $usuario->rol }}</span>
                                                        {{-- </h5>
                                                            @endforeach
                                                        @endif --}}
                                                    </td>
                                                    <td class="column5">
                                                        <h5>
                                                            <span class="badge bg-primary"
                                                                wire:click='cargarDatosCarreras({{ $usuario->id }})'
                                                                data-toggle="modal"
                                                                data-target="#modalAtributosCarrera">Carreras
                                                                {{ count($usuario->carreras) }}</span>
                                                        </h5>
                                                    </td>
                                                    <td class="column4">
                                                        {{-- display:inline --}}
                                                        <div class="acciones">
                                                            <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                                                data-toggle="tooltip" data-placement="bottom"
                                                                title="Editar">

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
                                                                {{-- <label class="etiqueta">Editar</label> --}}
                                                            </a>
                                                            <form
                                                                action="{{ route('usuarios.destroy', [$usuario->id]) }}"
                                                                method="POST" class="form-eliminar">
                                                                @method('DELETE')
                                                                @csrf
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
                                                                    {{-- <label class="etiqueta">Eliminar</label> --}}
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                            <div class="pagination justify-content-end">
                                {{-- {!! $usuarios->links() !!} --}}
                            </div>
                        </div>
                        {{-- @endif --}}
                        <a href="{{ route('usuarios.create') }}" class="btn-flotante">Agregar Usuario</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- MODAL VER CARRERAS DEL USUARIO SELECCIONADO --}}

    <div wire:ignore.self class="modal fade" id="modalAtributosCarrera">
        <div class="modal-dialog modal-lg" style="z-index: 4000;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Carreras de:
                        {{ $temp == null ? '' : $temp->name }}</h4>
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
                    @if ($temp)
                        @if (count($temp->carreras))
                            <h4>Lista de Carreras</h4>
                            <table>
                                <thead>
                                    <tr class="table100-head-modal" style="color: white">
                                        <th class="column1-modal">#</th>
                                        <th class="column2-modal">Carrera</th>
                                        <th class="column2-modal">Plan de Estudios</th>
                                        @if (Auth::user()->getRoleNames()[0] == 'Administrador')
                                            <th class="column2-modal">Creado Por</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($temp->carreras as $item)
                                        <tr>
                                            <td class="column1-modal"> {{ $loop->iteration }}</td>
                                            <td class="column2-modal"> {{ $item->carrera }}</td>
                                            <td class="column2-modal"> {{ $item->planEstudios }}</td>
                                            <td class="column2-modal">
                                                {{ App\Models\User::find($item->creadopor)->name . ' ' . App\Models\User::find($item->creadopor)->apellido }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h2>Este usuario no tiene carreras seleccionadas</h2>

                        @endif
                    @endif

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL VER PERMISOS DE USUARIO --}}
    <div wire:ignore.self class="modal fade" id="modalUsuarioPermisos">
        <div class="modal-dialog modal-md" style="z-index: 4000;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Lista de permisos del Usuario:</h4>
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
                    {{-- @if ($permisosRol)
                        <ol class="list-group list-group-numbered">
                            @foreach ($permisosRol as $item)
                                <li class="list-group-item">{{ $permisos[$item] }} </li>
                            @endforeach
                        </ol>

                    @endif --}}
                    @if ($permisosRol)
                        <table>
                            <thead>
                                <tr class="table100-head-modal" style="color: white">
                                    <th class="column3-modal">#</th>
                                    <th class="column4-modal">Permisos</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permisosRol as $item)
                                    <tr>
                                        <td class="column3-modal"> {{ $loop->iteration }} </td>
                                        <td class="column4-modal"> {{ $permisos[$item] }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


</div>
