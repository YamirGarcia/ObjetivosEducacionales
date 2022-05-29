<div>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Bienvenido {{ \Illuminate\Support\Facades\Auth::user()->name }}</h3>

        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="card-body">

                            <div class="container">
                                <div class="progres-container">
                                    <h5>{{ $tablaC3 }}</h5>
                                    @foreach ($dataObjetivos as $item)
                                        <div class="bar-container">
                                            {{-- <div> --}}
                                            <p class="texto-objetivo">{{ $item['objetivo'] }}</p>
                                            <p class="texto-valor">{{ $item['valor'] }}</p>
                                            <p class="texto-meta">{{ $item['meta'] }}</p>
                                            {{-- </div> --}}
                                            <div class="progres-bar">
                                                <div class="{{ $item['clase'] }}" style="{{ $item['porcentaje'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="progres-container">
                                    <h5>{{ $tablaC3 }}</h5>
                                    @foreach ($dataObjetivosC4 as $item)
                                        <div class="bar-container">
                                            {{-- <div> --}}
                                            <p class="texto-objetivo">{{ $item['atributo'] }}</p>
                                            <p class="texto-valor">{{ $item['valor'] }}</p>
                                            <p class="texto-meta">{{ $item['meta'] }}</p>
                                            {{-- </div> --}}
                                            <div class="progres-bar">
                                                <div class="{{ $item['clase'] }}"
                                                    style="{{ $item['porcentaje'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#staticBackdrop">
                                    configuración
                                </button>

                                <div class="container-button">

                                    <div class="card-home ">
                                        <div class="card-img bg-card-blue">
                                            <div class="info">
                                                <p class="text-title">Usuarios </p>
                                                <h4 class="text-cent" style="font-size: 40px !important">
                                                    {{ count(App\Models\User::all()) }}</h4>
                                            </div>
                                            <svg class="usuarios" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 640 512">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M319.9 320c57.41 0 103.1-46.56 103.1-104c0-57.44-46.54-104-103.1-104c-57.41 0-103.1 46.56-103.1 104C215.9 273.4 262.5 320 319.9 320zM369.9 352H270.1C191.6 352 128 411.7 128 485.3C128 500.1 140.7 512 156.4 512h327.2C499.3 512 512 500.1 512 485.3C512 411.7 448.4 352 369.9 352zM512 160c44.18 0 80-35.82 80-80S556.2 0 512 0c-44.18 0-80 35.82-80 80S467.8 160 512 160zM183.9 216c0-5.449 .9824-10.63 1.609-15.91C174.6 194.1 162.6 192 149.9 192H88.08C39.44 192 0 233.8 0 285.3C0 295.6 7.887 304 17.62 304h199.5C196.7 280.2 183.9 249.7 183.9 216zM128 160c44.18 0 80-35.82 80-80S172.2 0 128 0C83.82 0 48 35.82 48 80S83.82 160 128 160zM551.9 192h-61.84c-12.8 0-24.88 3.037-35.86 8.24C454.8 205.5 455.8 210.6 455.8 216c0 33.71-12.78 64.21-33.16 88h199.7C632.1 304 640 295.6 640 285.3C640 233.8 600.6 192 551.9 192z" />
                                            </svg>

                                        </div>
                                        <div class="card-info">
                                            <div class="card-text">
                                                <p class="text-subtitle">Ver más...</p>
                                            </div>
                                            <div class="card-icon">
                                                <svg viewBox="0 0 28 25">
                                                    <path
                                                        d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-home ">
                                        <div class="card-img bg-card-blue-2">
                                            <div class="info">
                                                <p class="text-title">Carreras </p>
                                                <h4 class="text-cent" style="font-size: 40px !important">
                                                    120</h4>
                                            </div>
                                            <svg class="carreras" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 640 512">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M320 128C328.8 128 336 135.2 336 144V160H352C360.8 160 368 167.2 368 176C368 184.8 360.8 192 352 192H320C311.2 192 304 184.8 304 176V144C304 135.2 311.2 128 320 128zM476.8 98.06L602.4 125.1C624.4 130.9 640 150.3 640 172.8V464C640 490.5 618.5 512 592 512H48C21.49 512 0 490.5 0 464V172.8C0 150.3 15.63 130.9 37.59 125.1L163.2 98.06L302.2 5.374C312.1-1.791 327-1.791 337.8 5.374L476.8 98.06zM256 512H384V416C384 380.7 355.3 352 320 352C284.7 352 256 380.7 256 416V512zM96 192C87.16 192 80 199.2 80 208V272C80 280.8 87.16 288 96 288H128C136.8 288 144 280.8 144 272V208C144 199.2 136.8 192 128 192H96zM496 272C496 280.8 503.2 288 512 288H544C552.8 288 560 280.8 560 272V208C560 199.2 552.8 192 544 192H512C503.2 192 496 199.2 496 208V272zM96 320C87.16 320 80 327.2 80 336V400C80 408.8 87.16 416 96 416H128C136.8 416 144 408.8 144 400V336C144 327.2 136.8 320 128 320H96zM496 400C496 408.8 503.2 416 512 416H544C552.8 416 560 408.8 560 400V336C560 327.2 552.8 320 544 320H512C503.2 320 496 327.2 496 336V400zM320 88C271.4 88 232 127.4 232 176C232 224.6 271.4 264 320 264C368.6 264 408 224.6 408 176C408 127.4 368.6 88 320 88z" />
                                            </svg>

                                        </div>
                                        <div class="card-info">
                                            <div class="card-text">
                                                <p class="text-subtitle">Ver más...</p>
                                            </div>
                                            <div class="card-icon">
                                                <svg viewBox="0 0 28 25">
                                                    <path
                                                        d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-home ">
                                        <div class="card-img bg-card-green">
                                            <div class="info">
                                                <p class="text-title-evaluadores"
                                                    style="position: relative; right: -120px">
                                                    Evaluadores</p>
                                                <h4 class="text-cent" style="font-size: 40px !important">
                                                    3200</h4>
                                            </div>
                                            <svg class="evaluadores" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M352 128C352 198.7 294.7 256 224 256C153.3 256 96 198.7 96 128C96 57.31 153.3 0 224 0C294.7 0 352 57.31 352 128zM209.1 359.2L176 304H272L238.9 359.2L272.2 483.1L311.7 321.9C388.9 333.9 448 400.7 448 481.3C448 498.2 434.2 512 417.3 512H30.72C13.75 512 0 498.2 0 481.3C0 400.7 59.09 333.9 136.3 321.9L175.8 483.1L209.1 359.2z" />
                                            </svg>

                                        </div>
                                        <div class="card-info">
                                            <div class="card-text">
                                                <p class="text-subtitle">Ver más...</p>
                                            </div>
                                            <div class="card-icon">
                                                <svg viewBox="0 0 28 25">
                                                    <path
                                                        d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-home end">
                                        <div class="card-img bg-card-green-2">
                                            <div class="info">
                                                <p class="text-title">Encuestas</p>
                                                <h4 class="text-cent" style="font-size: 40px !important">
                                                    {{ count(App\Models\User::all()) }}</h4>
                                            </div>
                                            <svg class="encuestas" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M448 416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416zM256 160C256 142.3 241.7 128 224 128H128C110.3 128 96 142.3 96 160C96 177.7 110.3 192 128 192H224C241.7 192 256 177.7 256 160zM128 224C110.3 224 96 238.3 96 256C96 273.7 110.3 288 128 288H320C337.7 288 352 273.7 352 256C352 238.3 337.7 224 320 224H128zM192 352C192 334.3 177.7 320 160 320H128C110.3 320 96 334.3 96 352C96 369.7 110.3 384 128 384H160C177.7 384 192 369.7 192 352z" />
                                            </svg>

                                        </div>
                                        <div class="card-info">
                                            <div class="card-text">
                                                <p class="text-subtitle">Ver más...</p>
                                            </div>
                                            <div class="card-icon">
                                                <svg viewBox="0 0 28 25">
                                                    <path
                                                        d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal para cambiar configuración de las metas -->
    <div wire:ignore.self class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Configuración de Visualización de Metas</h5>
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
                    <label for="">Carrera</label>
                    <select class="form-control" name="" id="" required wire:model="carreraConf">
                        <option disabled selected value="">Seleccionar Carrera</option>
                        @foreach ($carreras as $carrera)
                            <option value="{{ $carrera->id }}">{{ $carrera->carrera }} |
                                {{ $carrera->planEstudios }}
                            </option>
                        @endforeach
                    </select>
                    <label for="">Periodo</label>
                    <select class="form-control" name="" id="" required wire:model="periodoConf">
                        <option disabled selected value="">Seleccionar Periodo</option>
                        <option value="ENE-JUN-">ENE-JUN</option>
                        <option value="VERANO-">VERANO</option>
                        <option value="AGO-DIC-">AGO-DIC</option>
                    </select>
                    <label for="">Año</label>
                    <select class="form-control" name="" id="" required wire:model="añoConf">
                        <option selected disabled value="">Seleccionar Año </option>
                        @foreach (range(date('Y'), 2017) as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                    {{ $carreraConf }}{{ $periodoConf }}

                </div>
                <div class="col-xs-8 col-sm-12 col-md-15" style="left: -35px">
                    <button class="boton-submit" wire:click='guardarConfiguracion'>Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>
