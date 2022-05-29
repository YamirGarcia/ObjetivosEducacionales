<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="row mb-4">
        <div style="display: flex">
            <button class="btn-clean" wire:click='limpiar' data-toggle="tooltip" data-placement="bottom"
                title="Limpiar">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="24" height="24" style="fill: #fff">
                    <path
                        d="M224 0H336C362.5 0 384 21.49 384 48V256H0V48C0 21.49 21.49 0 48 0H64L96 64L128 0H160L192 64L224 0zM384 288V320C384 355.3 355.3 384 320 384H256V448C256 483.3 227.3 512 192 512C156.7 512 128 483.3 128 448V384H64C28.65 384 0 355.3 0 320V288H384zM192 464C200.8 464 208 456.8 208 448C208 439.2 200.8 432 192 432C183.2 432 176 439.2 176 448C176 456.8 183.2 464 192 464z" />
                </svg>
            </button>
            @if ($botonMostrar)
                <button class="btn-clean" wire:click='mostrarOcultos' data-toggle="tooltip" data-placement="bottom"
                    title="Mostrar Ocultos">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M150.7 92.77C195 58.27 251.8 32 320 32C400.8 32 465.5 68.84 512.6 112.6C559.4 156 590.7 207.1 605.5 243.7C608.8 251.6 608.8 260.4 605.5 268.3C592.1 300.6 565.2 346.1 525.6 386.7L630.8 469.1C641.2 477.3 643.1 492.4 634.9 502.8C626.7 513.2 611.6 515.1 601.2 506.9L9.196 42.89C-1.236 34.71-3.065 19.63 5.112 9.196C13.29-1.236 28.37-3.065 38.81 5.112L150.7 92.77zM223.1 149.5L313.4 220.3C317.6 211.8 320 202.2 320 191.1C320 180.5 316.1 169.7 311.6 160.4C314.4 160.1 317.2 159.1 320 159.1C373 159.1 416 202.1 416 255.1C416 269.7 413.1 282.7 407.1 294.5L446.6 324.7C457.7 304.3 464 280.9 464 255.1C464 176.5 399.5 111.1 320 111.1C282.7 111.1 248.6 126.2 223.1 149.5zM320 480C239.2 480 174.5 443.2 127.4 399.4C80.62 355.1 49.34 304 34.46 268.3C31.18 260.4 31.18 251.6 34.46 243.7C44 220.8 60.29 191.2 83.09 161.5L177.4 235.8C176.5 242.4 176 249.1 176 255.1C176 335.5 240.5 400 320 400C338.7 400 356.6 396.4 373 389.9L446.2 447.5C409.9 467.1 367.8 480 320 480H320z" />
                    </svg>
                </button>
            @else
                <button class="btn-clean" wire:click='mostrarOcultos' data-toggle="tooltip" data-placement="bottom"
                    title="Mostrar No Ocultos">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z" />
                    </svg>
                </button>
            @endif
            <div class="buscador btn-clean">
                <form action="">
                    <input wire:model="search" type="search" required>
                    <i class="fa fa-search fa-vc"></i>
                </form>
            </div>
        </div>
    </div>

    @if ($carreras->count() == 0)
        @if ($search)
            <h1 class="text-center">
                Sin Resultados
            </h1>
        @else
            <h1 class="text-center">No Existen Carreras Asignadas
            </h1>
        @endif
    @else
        <table class="tabla-general">
            <thead>
                <tr class="table100-head">
                    <th class="column1-modal"">#</th>
                    <th class="    column1">
                        <button class="bg-transparent" style="border: none" wire:click="sortable('carrera')">
                            <span style="color: white"> Carrera </span>
                            <span class="fa fa{{ $campo === 'carrera' ? $icon : '-circle' }}"
                                style="color: white"></span>
                        </button>
                    </th>
                    <th class="column2">
                        <button class="bg-transparent" style="border: none" wire:click="sortable('planEstudios')">
                            <span style="color: white"> Plan de estudios </span>
                            <span class="fa fa{{ $campo === 'planEstudios' ? $icon : '-circle' }}"
                                style="color: white"></span>
                        </button>
                    </th>
                    <th class="column3">Propiedades</th>
                    <th class="column4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carreras as $carrera)
                    <tr class="{{ $carrera->oculto ? 'table100-head-oculto' : 'table100-head' }}">
                        <td class="column1-modal">{{ $loop->iteration }}</td>
                        <td class="column1">{{ $carrera->carrera }}</td>
                        <td class="column2">{{ $carrera->planEstudios }}</td>
                        <td class="column3">
                            <div class="acciones">
                                <button class="chip primary" data-toggle="modal"
                                    data-target="#modalCarreraUsuario{{ $carrera->id }}">
                                    <span>
                                        @if ($band)
                                            Usuarios: {{ $carrera->usuarios->count() }}
                                        @else
                                            Usuarios:
                                            {{ App\Models\Carrera::find($carrera->carrera_id)->usuarios->count() }}
                                        @endif
                                    </span>
                                </button>
                                @can('ver-atributos')
                                    <button class="chip primary" data-toggle="modal"
                                        data-target="#modalAtributosCarrera{{ $carrera->id }}">
                                        <span>
                                            @if ($band)
                                                Atributos: {{ $carrera->atributos->count() }}
                                            @else
                                                Atributos:
                                                {{ App\Models\Carrera::find($carrera->carrera_id)->atributos->count() }}
                                            @endif
                                        </span>
                                    </button>
                                @endcan
                                @can('ver-objetivos')
                                    <button class="chip primary" data-toggle="modal"
                                        data-target="#modalObjetivosCarrera{{ $carrera->id }}">
                                        <span>
                                            @if ($band)
                                                Objetivos: {{ $carrera->objetivos->count() }}
                                            @else
                                                Objetivos:
                                                {{ App\Models\Carrera::find($carrera->carrera_id)->objetivos->count() }}
                                            @endif
                                        </span>
                                    </button>
                                @endcan
                            </div>
                        </td>
                        <td class="column4">
                            <div class="acciones">
                                @can('editar-carrera')
                                    <a href="#" data-toggle="modal" data-target="#modalEditar{{ $carrera->id }}"
                                        data-placement="bottom" title="Editar">
                                        <div class="icon edit-fill">
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
                                @can('borrar-carrera')
                                    <form action=''
                                    {{-- action="{{ route('carreras.destroy', $carrera->id) }}" method="POST" --}}
                                        class="form-eliminar" >
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" style="border: none; background: none" data-toggle="tooltip"
                                        wire:click="$emit('EliminarCarrera', {{ $carrera->id }}, {{App\Models\Carrera::find($carrera->id)->noBorrar}})"
                                            data-placement="bottom"
                                            @if ($carrera->noBorrar == true) title="Ocultar"
                                            @else 
                                                title="Eliminar" 
                                            @endif
                                            >
                                            <div class="icon trash-fill">
                                                <i>

                                                    @if ($carrera->noBorrar == true)
                                                        @if ($carrera->oculto)
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                                <path
                                                                    d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z" />
                                                            </svg>
                                                        @else
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                                <path
                                                                    d="M150.7 92.77C195 58.27 251.8 32 320 32C400.8 32 465.5 68.84 512.6 112.6C559.4 156 590.7 207.1 605.5 243.7C608.8 251.6 608.8 260.4 605.5 268.3C592.1 300.6 565.2 346.1 525.6 386.7L630.8 469.1C641.2 477.3 643.1 492.4 634.9 502.8C626.7 513.2 611.6 515.1 601.2 506.9L9.196 42.89C-1.236 34.71-3.065 19.63 5.112 9.196C13.29-1.236 28.37-3.065 38.81 5.112L150.7 92.77zM223.1 149.5L313.4 220.3C317.6 211.8 320 202.2 320 191.1C320 180.5 316.1 169.7 311.6 160.4C314.4 160.1 317.2 159.1 320 159.1C373 159.1 416 202.1 416 255.1C416 269.7 413.1 282.7 407.1 294.5L446.6 324.7C457.7 304.3 464 280.9 464 255.1C464 176.5 399.5 111.1 320 111.1C282.7 111.1 248.6 126.2 223.1 149.5zM320 480C239.2 480 174.5 443.2 127.4 399.4C80.62 355.1 49.34 304 34.46 268.3C31.18 260.4 31.18 251.6 34.46 243.7C44 220.8 60.29 191.2 83.09 161.5L177.4 235.8C176.5 242.4 176 249.1 176 255.1C176 335.5 240.5 400 320 400C338.7 400 356.6 396.4 373 389.9L446.2 447.5C409.9 467.1 367.8 480 320 480H320z" />
                                                            </svg>
                                                        @endif
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                            <path
                                                                d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z" />
                                                        </svg>
                                                    @endif


                                                </i>
                                            </div>
                                        </button>
                                    </form>
                                @endcan
                                @can('ver-objetivos')
                                    <form action="{{ route('ObjetivoEducacional.show', $carrera->id) }}" method="GET">
                                        @csrf
                                        <button class="btn-tabla" type="submit" data-toggle="tooltip"
                                            data-placement="bottom" title="Objetivos Educacionales">
                                            <div class="icon objetivos-fill">
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                        <path
                                                            d="M223.7 130.8L149.1 7.77C147.1 2.949 141.9 0 136.3 0H16.03c-12.95 0-20.53 14.58-13.1 25.18l111.3 158.9C143.9 156.4 181.7 137.3 223.7 130.8zM256 160c-97.25 0-176 78.75-176 176S158.8 512 256 512s176-78.75 176-176S353.3 160 256 160zM348.5 317.3l-37.88 37l8.875 52.25c1.625 9.25-8.25 16.5-16.63 12l-46.88-24.62L209.1 418.5c-8.375 4.5-18.25-2.75-16.63-12l8.875-52.25l-37.88-37C156.6 310.6 160.5 299 169.9 297.6l52.38-7.625L245.7 242.5c2-4.25 6.125-6.375 10.25-6.375S264.2 238.3 266.2 242.5l23.5 47.5l52.38 7.625C351.6 299 355.4 310.6 348.5 317.3zM495.1 0H375.7c-5.621 0-10.83 2.949-13.72 7.77l-73.76 122.1c42 6.5 79.88 25.62 109.5 53.38l111.3-158.9C516.5 14.58 508.9 0 495.1 0z" />
                                                    </svg>
                                                </i>
                                            </div>
                                        </button>
                                    </form>
                                @endcan
                                @can('ver-atributos')
                                    <form action="{{ route('Atributos.show', $carrera->id) }}">
                                        <button class="btn-tabla" type="submit" data-toggle="tooltip"
                                            data-placement="bottom" title="Atributos">
                                            <div class="icon atributos-fill">
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                        <path
                                                            d="M45.63 79.75L52 81.25v58.5C45 143.9 40 151.3 40 160c0 8.375 4.625 15.38 11.12 19.75L35.5 242C33.75 248.9 37.63 256 43.13 256h41.75c5.5 0 9.375-7.125 7.625-13.1L76.88 179.8C83.38 175.4 88 168.4 88 160c0-8.75-5-16.12-12-20.25V87.13L128 99.63l.001 60.37c0 70.75 57.25 128 128 128s127.1-57.25 127.1-128L384 99.62l82.25-19.87c18.25-4.375 18.25-27 0-31.5l-190.4-46c-13-3-26.62-3-39.63 0l-190.6 46C27.5 52.63 27.5 75.38 45.63 79.75zM359.2 312.8l-103.2 103.2l-103.2-103.2c-69.93 22.3-120.8 87.2-120.8 164.5C32 496.5 47.53 512 66.67 512h378.7C464.5 512 480 496.5 480 477.3C480 400 429.1 335.1 359.2 312.8z" />
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
    @endif
    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        console.log('Hola Mundo');
        Livewire.on('EliminarCarrera', (carrera, noBorrar) => {
            // console.log(estado);
            // let leyenda = carrera.noBorrar ? carrera.oculto ? 'Dejar de Ocultar' : 'Ocultar' : 'Eliminar';
            // console.log('noBorrar = ', noBorrar, 'oculto = ',oculto);
            let leyenda = noBorrar ?   'Realizar esta acción': 'Borrar';

            Swal.fire({
                title: `¿Está seguro de ${leyenda} esta Carrera?`,
                text: "¡Se afectará la Carrera, sus Objetivos Educacionales,  sus Aspectos y sus preguntas relacionadas en el sistema!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar',
                }).then((result) => {
                if (result.isConfirmed) {
                    // 
                    Swal.fire(
                    'Hecho',
                    '',
                    'success'
                    )
                    setTimeout(() => {
                    }, 900);

                    Livewire.emit('eliminarCarrera', carrera);
                }
                });



        });
    </script>
    @endpush
</div>
