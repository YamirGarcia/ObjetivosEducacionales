<div>
    <div class="card-body">
        <h2>Tabla de Promedios</h2>
        <div class="container-tabla-filtros" style="height: 665px">
            <div class="filtros" style="position: relative">
                <label for="">Tipo</label>
                <select name="" id="tipo" class="form-select" wire:model="tipoSeleccionado">
                    <option selected disabled value="">Seleccionar Tipo Encuesta </option>
                    <option value="Objetivos">Objetivos Educacionales</option>
                    <option value="Atributos">Atributos</option>
                </select>
                <label for="">Carrera</label>
                <select name="" id="carrera" class="form-select" wire:model="carreraSeleccionada">
                    <option selected disabled value="">Seleccionar Carrera</option>
                    @foreach ($carreras2 as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->carrera}} | {{$carrera->planEstudios}}</option>
                    @endforeach
                </select>
                <label for="">Periodo</label>
                <select name="" id="carrera" class="form-select" wire:model="periodoSeleccionado">
                    <option selected disabled value="">Seleccionar Periodo </option>
                    <option value="ENE-JUN-">ENE-JUN</option>
                    <option value="VERANO-">VERANO</option>
                    <option value="AGO-DIC-">AGO-DIC</option>
                </select>
                <label for="">Año</label>
                <select name="" id="año" class="form-select" wire:model="añoSeleccionado">
                    <option selected disabled value="">Seleccionar Año </option>
                    @foreach (range(date('Y'),2017) as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="tabla">
                @if ($datosObjetivos)
                    {{-- @if ($tipoSeleccionado == 'Objetivos') --}}
                    <div id="containerObjetivos" style="width:97%; margin: 5rem auto; "></div>
                    <div class="container-card">
                        <div class="card-informativa" style="position: relative; top: -70px; margin-bottom: -30px">

                            <span id="span-info" class="text text--1">{{ $tabla }} </span>
                            <br>
                            <span class="quantity">{{ count($encuestas) }}</span>
                            <span class="text text--2"> Encuestas </span>
                            <br>
                            <span class="quantity"> {{ count($evaluadores) }} </span>
                            <span class="text text--3"> Evaluadores </span>
                        </div>
                    </div>
                    {{-- @else
                        <div id="containerAtributos" style="width:97%; margin: 5rem auto; "></div>
                    @endif --}}
                @else
                    <img class="preview" src="img/prev-graficas.png" alt="">
                    <h2 style="text-align: center; margin-top: -60px; margin-bottom: 70px">Sin Datos Por Mostrar.</h2>
                @endif

            </div>
        </div>
    </div>

    <br>
    <br>
    <div class="card-body">
        <h1>Tabla Comparativa</h1>
        <div class="container-tabla-filtros">
            <div class="filtros">
                <div class="fil1">
                    <h5>Tabla 1</h5>
                    <label for="">Tipo</label>
                    <select id="tipoC1" name="" class="form-select" wire:model="tipoSeleccionadoC1">
                        <option selected disabled value="">Seleccionar Tipo Encuesta </option>
                        <option value="Objetivos">Objetivos Educacionales</option>
                        <option value="Atributos">Atributos</option>
                    </select>
                    <label for="">Carrera</label>
                    <select id="carreraC1" name="" class="form-select" wire:model="carreraSeleccionadaC1">
                        <option selected disabled value="">Seleccionar Carrera</option>
                        @foreach ($carreras2 as $carrera)
                            <option value="{{ $carrera->id }}">{{ $carrera->carrera}} | {{$carrera->planEstudios}}</option>
                        @endforeach
                    </select>
                    <label for="">Periodo</label>
                    <select id="periodoC1" name="" class="form-select" wire:model="periodoSeleccionadoC1">
                        <option selected disabled value="">Seleccionar Periodo </option>
                        <option value="ENE-JUN-">ENE-JUN</option>
                        <option value="VERANO-">VERANO</option>
                        <option value="AGO-DIC-">AGO-DIC</option>
                    </select>
                    <label for="">Año</label>
                    <select id="añoC1" name="" class="form-select" wire:model="añoSeleccionadoC1">
                        <option selected disabled value="">Seleccionar Año </option>
                        @foreach (range(date('Y'),2017) as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="fil2">
                    <h5>Tabla 2:</h5>
                    <label for="">Tipo</label>
                    <select id="tipoC2" name="" class="form-select" wire:model="tipoSeleccionadoC2">
                        <option selected disabled value="">Seleccionar Tipo Encuesta </option>
                        <option value="Objetivos">Objetivos Educacionales</option>
                        <option value="Atributos">Atributos</option>
                    </select>
                    <label for="">Carrera</label>
                    <select id="carreraC2" name="" class="form-select" wire:model="carreraSeleccionadaC2">
                        <option selected disabled value="">Seleccionar Carrera</option>
                        @foreach ($carreras2 as $carrera)
                            <option value="{{ $carrera->id }}">{{ $carrera->carrera}} | {{$carrera->planEstudios}}</option>
                        @endforeach
                    </select>
                    <label for="">Periodo</label>
                    <select id="periodoC2" name="" class="form-select" wire:model="periodoSeleccionadoC2">
                        <option selected disabled value="">Seleccionar Periodo </option>
                        <option value="ENE-JUN-">ENE-JUN</option>
                        <option value="VERANO-">VERANO</option>
                        <option value="AGO-DIC-">AGO-DIC</option>
                    </select>
                    <label for="">Año</label>
                    <select id="añoC2" name="" class="form-select" wire:model="añoSeleccionadoC2">
                        <option selected disabled value="">Seleccionar Año </option>
                        @foreach (range(date('Y'), 2017) as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="tabla">
                @if ($dataTablaComparativaC1 && $dataTablaComparativaC2)
                    <div id="containerComparative" style="width:85%; margin: 5rem auto; "></div>
                    <div class="container-card">
                        <div class="card-informativa">

                            <span id="span-info" class="text text--1"> {{ $tablaC1 }} </span>
                            <br>
                            <span class="quantity"> {{ count($encuestasC1) }} </span>
                            <span class="text text--2"> Encuestas </span>
                            <br>
                            <span class="quantity"> {{ count($evaluadoresC1) }} </span>
                            <span class="text text--3"> Evaluadores </span>
                        </div>
                        <div class="card-informativa">
                            <span id="span-info" class="text text--1"> {{ $tablaC2 }} </span>
                            <br>
                            <span class="quantity"> {{ count($encuestasC2) }} </span>
                            <span class="text text--2"> Encuestas </span>
                            <br>
                            <span class="quantity"> {{ count($evaluadoresC2) }} </span>
                            <span class="text text--3"> Evaluadores </span>
                        </div>
                    </div>
                @else
                    <img class="preview" src="img/prev-graficas.png" alt="">
                    <h2 style="text-align: center; margin-top: -60px; margin-bottom: 70px">Sin Datos Por Mostrar.</h2>
                    {{-- <h2 style="text-align: center">No existen datos a mostrar.</h2> --}}
                @endif
            </div>
        </div>
    </div>


    <br>
    <br>
    <div class="card-body">
        <h2>Tabla de Metas</h2>
        <div class="container-tabla-filtros" style="height: 665px">
            <div class="filtros" style="position: relative">
                <label for="">Tipo</label>
                <select name="" id="tipo" class="form-select" wire:model="tipoSeleccionadoC3">
                    <option selected disabled value="">Seleccionar Tipo Encuesta </option>
                    <option value="Objetivos">Objetivos Educacionales</option>
                    <option value="Atributos">Atributos</option>
                </select>
                <label for="">Carrera</label>
                <select name="" id="carrera" class="form-select" wire:model="carreraSeleccionadaC3">
                    <option selected disabled value="">Seleccionar Carrera</option>
                    @foreach ($carreras2 as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->carrera}} | {{$carrera->planEstudios}}</option>
                    @endforeach
                </select>
                <label for="">Periodo</label>
                <select name="" id="carrera" class="form-select" wire:model="periodoSeleccionadoC3">
                    <option selected disabled value="">Seleccionar Periodo </option>
                    <option value="ENE-JUN-">ENE-JUN</option>
                    <option value="VERANO-">VERANO</option>
                    <option value="AGO-DIC-">AGO-DIC</option>
                </select>
                <label for="">Año</label>
                <select name="" id="año" class="form-select" wire:model="añoSeleccionadoC3">
                    <option selected disabled value="">Seleccionar Año </option>
                    @foreach (range(date('Y'),2017) as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="tabla">
                @if ($dataColumnaMetas)
                    {{-- @if ($tipoSeleccionado == 'Objetivos') --}}
                    <div id="containerMetas" style="width:95%; margin: 5rem auto; "></div>
                    <div class="container-card">
                        <div class="card-informativa" style="position: relative; top: -70px; margin-bottom: -30px">

                            <span id="span-info" class="text text--1">{{ $tablaC3 }} </span>
                            <br>
                            <span class="quantity">{{ count($encuestasC3) }}</span>
                            <span class="text text--2"> Encuestas </span>
                            <br>
                            <span class="quantity"> {{ count($evaluadoresC3) }} </span>
                            <span class="text text--3"> Evaluadores </span>
                        </div>
                    </div>
                    {{-- @else
                        <div id="containerAtributos" style="width:97%; margin: 5rem auto; "></div>
                    @endif --}}
                @else
                    <img class="preview" src="img/prev-graficas.png" alt="">
                    <h2 style="text-align: center; margin-top: -60px; margin-bottom: 70px">Sin Datos Por Mostrar.</h2>
                @endif

            </div>
        </div>
    </div>

    <script>
        Highcharts.setOptions({
            lang: {
                months: [
                    'Janvier', 'Février', 'Mars', 'Avril',
                    'Mai', 'Juin', 'Juillet', 'Août',
                    'Septembre', 'Octobre', 'Novembre', 'Décembre'
                ],
                weekdays: [
                    'Dimanche', 'Lundi', 'Mardi', 'Mercredi',
                    'Jeudi', 'Vendredi', 'Samedi'
                ],
                viewFullscreen: "Ver en Pantalla Completa",
                exitFullscreen: "Salir de Pantalla Completa",
                printChart: "Imprimir Tabla",
                downloadPNG: "Descargar en PNG",
                downloadJPEG: "Descargar en JPEG",
                downloadPDF: "Descargar en PDF",
                downloadSVG: "Descargar en SVG (Vector de Imagen)",
                downloadCSV: false,
                downloadXLS: "Descargar en .xls",
                viewData: false
            },
            plotOptions: {
                series: {
                    animation: false
                }
            },
            colors: ['#72efdd', '#5e60ce', '#99d98c', '#144552', '#ff9e00', '#ff4d6d', '#56ab91', '#FFF263',
                '#c19ee0', '#cc3399'
            ]
        });
        var defaultTitleObjetivos = "Promedios Generales";
        var drilldownTitleObjetivos = "Promedios Específicos";
        // let x = @this.nombresObjetivosC1;
        // console.log(x);
        var carrerac1;
        var carrerac1S;
        var periodoc1;
        var periodoc1S
        var añoc1;
        var añoc1S;
        var carrerac2;
        var carrerac2S;
        var periodoc2;
        var periodoc2S
        var añoc2;
        var añoc2S;
        const span = document.getElementById('span-info');
        document.addEventListener('DOMContentLoaded', () => {
            Livewire.hook('message.processed', (el, component) => {
                carrerac1 = document.getElementById("carreraC1");
                carrerac1S = carrerac1.options[carrerac1.selectedIndex].text;
                periodoc1 = document.getElementById("periodoC1");
                periodoc1S = periodoc1.options[periodoc1.selectedIndex].text;
                añoc1 = document.getElementById("añoC1");
                añoc1S = añoc1.options[añoc1.selectedIndex].text;
                carrerac2 = document.getElementById("carreraC2");
                carrerac2S = carrerac2.options[carrerac2.selectedIndex].text;
                periodoc2 = document.getElementById("periodoC2");
                periodoc2S = periodoc2.options[periodoc2.selectedIndex].text;
                añoc2 = document.getElementById("añoC2");
                añoc2S = añoc2.options[añoc2.selectedIndex].text;
                if (@this.renderizar) {
                    const chart = Highcharts.chart('containerObjetivos', {
                        chart: {
                            type: 'column',
                            renderTo: 'containerObjetivos',
                            events: {
                                drilldown: function(e) {
                                    chart.setTitle({
                                        text: drilldownTitleObjetivos
                                    });
                                },
                                drillup: function(e) {
                                    chart.setTitle({
                                        text: defaultTitleObjetivos
                                    });
                                }
                            }
                        },
                        title: {
                            text: defaultTitleObjetivos
                        },
                        credits: {
                            enabled: false
                        },
                        accessibility: {
                            announceNewData: {
                                enabled: true
                            }
                        },
                        xAxis: {
                            type: 'category'
                        },
                        yAxis: {
                            title: {
                                text: 'Promedios'
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:.2f}'
                                }
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:11px">{point.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span><br>Promedio: <b>{point.y:.2f}</b>'
                        },
                        series: [{
                            name: 'Objetivos',
                            colorByPoint: true,
                            borderRadius: 10,
                            // PRIMERAS COLUMNAS A MOSTRAR
                            data: @this.datosObjetivos
                        }],
                        // ------------------- SUBTABLAS -------------------
                        drilldown: {
                            breadcrumbs: {
                                position: {
                                    align: 'left'
                                }
                            },
                            series: @this.dataAspectos
                        }
                    });
                }
                if (@this.renderizarT2) {
                    Highcharts.chart('containerComparative', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Tabla comparativa'
                        },
                        xAxis: {
                            categories: @this.nombresObjetivosC1
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:.2f}'
                                }
                            }
                        },
                        tooltip: {
                            pointFormat: '<span style="color:{point.color}">{point.name}</span><br>Promedio: <b>{point.y:.2f}</b>'
                        },
                        credits: {
                            enabled: false
                        },
                        series: [{
                            borderRadius: 10,
                            name: @this.tablaC1,
                            data: @this.dataTablaComparativaC1
                        }, {
                            borderRadius: 10,
                            name: @this.tablaC2,
                            data: @this.dataTablaComparativaC2
                        }]
                    });
                    // Esto es para hacer que se vaya al final solo que no se como hacer para que identifique cuando los select de abajo se modificaron
                    // $('html, body').animate({scrollTop: document.body.scrollHeight}, 'fast');
                    //Para ir al principio de la pagina
                    // $('html, body').animate({scrollTop: 0}, 'fast');
                }

                if (@this.renderizarT3) {
                    Highcharts.chart('containerMetas', {
                        title: {
                            text: 'Tabla de Metas'
                        },
                        xAxis: {
                            categories: @this.nombresObjetivosC3
                        },
                        labels: {
                            items: [{
                                style: {
                                    left: '50px',
                                    top: '18px'
                                }
                            }]
                        },
                        credits: {
                            enabled: false
                        },
                        series: [{
                            type: 'column',
                            colorByPoint: true,
                            borderRadius: 10,
                            name: @this.tablaC3,
                            data: @this.dataColumnaMetas,
                        }, {
                            type: 'spline',
                            name: 'Metas',
                            color: 'black',
                            data: @this.dataMetas,
                            marker: {
                                lineWidth: 2,
                                lineColor: 'black',
                                color: 'orange',
                                fillColor: 'white'
                            }
                        }]
                    });
                }
            });
        });
    </script>




</div>
