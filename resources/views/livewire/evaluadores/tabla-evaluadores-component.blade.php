<div>
    <div class="row mb-4">
        <div style="display: flex">
            <button class="btn-clean" wire:click='clear' data-toggle="tooltip" data-placement="bottom"
                title="Limpiar" style="position: relative; top: 7px;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="24" height="24"
                    style="fill: #fff;">
                    <path
                        d="M224 0H336C362.5 0 384 21.49 384 48V256H0V48C0 21.49 21.49 0 48 0H64L96 64L128 0H160L192 64L224 0zM384 288V320C384 355.3 355.3 384 320 384H256V448C256 483.3 227.3 512 192 512C156.7 512 128 483.3 128 448V384H64C28.65 384 0 355.3 0 320V288H384zM192 464C200.8 464 208 456.8 208 448C208 439.2 200.8 432 192 432C183.2 432 176 439.2 176 448C176 456.8 183.2 464 192 464z" />
                </svg>
            </button>
            <div class="buscador">
                <form action="">
                    <input wire:model="search" type="search" name="search" id="search" required>
                    <i class="fa fa-search fa-vc"></i>
                </form>
            </div>
        </div>
    </div>
    @if ($evaluadores->count() == 0)
        @if ($search)
            <h1 class="text-center">
                Sin Resultados
            </h1>
        @else
            <h1 class="text-center">No Existen Evaluadores Asignados
            </h1>
        @endif
    @else
        <table class="tabla-general">
            <thead>
                <tr class="table100-head">
                    <th class="column1" style="display: none;">ID</th>
                    <th class="column2">
                        <button class="bg-transparent" style="border: none" wire:click="sortable('nombres')">
                            <span style="color: white"> Nombre </span>
                            <span class="fa fa{{ $campo === 'nombres' ? $icon : '-circle' }}"
                                style="color: white"></span>
                        </button>
                    </th>
                    <th class="column3">
                        <button class="bg-transparent" style="border: none" wire:click="sortable('correo')">
                            <span style="color: white"> Correo </span>
                            <span class="fa fa{{ $campo === 'correo' ? $icon : '-circle' }}"
                                style="color: white"></span>
                        </button>
                    </th>
                    <th class="column3">
                        <button class="bg-transparent" style="border: none" wire:click="sortable('telefono')">
                            <span style="color: white"> Telefono </span>
                            <span class="fa fa{{ $campo === 'telefono' ? $icon : '-circle' }}"
                                style="color: white"></span>
                        </button>
                    </th>
                    <th class="column4">
                        <button class="bg-transparent" style="border: none" wire:click="sortable('empresa')">
                            <span style="color: white"> Empresa </span>
                            <span class="fa fa{{ $campo === 'empresa' ? $icon : '-circle' }}"
                                style="color: white"></span>
                        </button>
                    </th>
                    <th class="column5">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($evaluadores as $evaluador)
                    @if ($evaluador->creadopor == $user_sesion || $user_rol == 'Administrador' )
                        <tr class="table100-head">
                            <td class="column1" style="display: none;">{{ $evaluador->id }}</td>
                            <td class="column2">{{ $evaluador->nombres }}</td>
                            <td class="column3">{{ $evaluador->correo }}</td>
                            <td class="column3">{{ $evaluador->telefono }}</td>
                            <td class="column4">{{ $evaluador->empresa }}</td>
                            <td class="column5">
                                <div class="acciones">
                                    @can('editar-evaluadores')
                                        <a href="{{ route('evaluadores.edit', $evaluador->id) }}">
                                            <div class="icon edit-fill" style="top: -8px">
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                        <path
                                                            d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z" />
                                                    </svg>
                                                </i>
                                            </div>
                                        </a>
                                    @endcan
                                    @can('borrar-evaluadores')
                                        <form action="{{ route('evaluadores.destroy', [$evaluador->id]) }}" method="POST"
                                            class="form-eliminar">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" style="border: none; background: none">
                                                <div class="icon trash-fill">
                                                    <i>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                            <path
                                                                d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z" />
                                                        </svg>
                                                    </i>
                                                </div>
                                            </button>
                                        </form>
                                    @endcan
                                    @can('visualizar-evaluadores')
                                        <a href="#" data-toggle="modal"
                                            data-target="#modalVisualizarInfo{{ $evaluador->id }}">
                                            <div class="icon visualizar-fill" style="top: -8px">
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                        <path
                                                            d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z" />
                                                    </svg>
                                                </i>
                                            </div>
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif
</div>
