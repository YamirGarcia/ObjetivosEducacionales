<div>
    <div class="card-body">
        <div class="row">
            <div class="col-3 tabla1" style="margin: 0 auto;">
                <label for="">Tipo</label>
                <select name="" id="tipo" class="form-select" wire:model="tipoSeleccionado">
                    <option selected disabled value="">Seleccionar Tipo Encuesta </option>
                    <option value="Objetivos">Objetivos Educacionales</option>
                    <option value="Atributos">Atributos</option>
                </select>
            </div>
            <div class="col-3 tabla1" style="margin: 0 auto;">
                <label for="">Carrera</label>
                <select name="" id="carrera" class="form-select" wire:model="carreraSeleccionada">
                    <option selected disabled value="">Seleccionar Carrera</option>
                    @foreach ($carreras2 as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->carrera }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3 tabla1" style="margin: 0 auto;">
                <label for="">Periodo</label>
                <select name="" id="carrera" class="form-select" wire:model="periodoSeleccionado">
                    <option selected disabled value="">Seleccionar Periodo </option>
                    <option value="ENE-JUN-">ENE-JUN</option>
                    <option value="VERANO-">VERANO</option>
                    <option value="AGO-DIC-">AGO-DIC</option>
                </select>
            </div>
            <div class="col-3 tabla1" style="margin: 0 auto;">
                <label for="">Año</label>
                <select name="" id="año" class="form-select" wire:model="añoSeleccionado">
                    <option selected disabled value="">Seleccionar Año </option>
                    @foreach (range(2017, date('Y')) as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <button type="button" wire:click="$emit('graficarTabla1')">Graficar</button> --}}
        </div>
    </div>

    {{-- rojo verder azul cyan magenta amarillo --}}
    @if ($datosObjetivos)
        @if ($tipoSeleccionado == 'Objetivos')
            <div id="containerObjetivos" style="width:85%; margin: 5rem auto; "></div>
        @else
            <div id="containerAtributos" style="width:85%; margin: 5rem auto; "></div>
        @endif
    @else
        <h2 style="text-align: center">No existen datos a mostrar.</h2>
    @endif

    <br>
    <br>
    <div class="card-body">
        <h5>Comparar:</h5>
        <div class="row">
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Tipo</label>
                <select id="tipoC1" name="" class="form-select" wire:model="tipoSeleccionadoC1">
                    <option selected disabled value="">Seleccionar Tipo Encuesta </option>
                    <option value="Objetivos">Objetivos Educacionales</option>
                    <option value="Atributos">Atributos</option>
                </select>
            </div>
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Carrera</label>
                <select id="carreraC1" name="" class="form-select" wire:model="carreraSeleccionadaC1">
                    <option selected disabled value="">Seleccionar Carrera</option>
                    @foreach ($carreras2 as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->carrera }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Periodo</label>
                <select id="periodoC1" name="" class="form-select" wire:model="periodoSeleccionadoC1">
                    <option selected disabled value="">Seleccionar Periodo </option>
                    <option value="ENE-JUN-">ENE-JUN</option>
                    <option value="VERANO-">VERANO</option>
                    <option value="AGO-DIC-">AGO-DIC</option>
                </select>
            </div>
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Año</label>
                <select id="añoC1" name="" class="form-select" wire:model="añoSeleccionadoC1">
                    <option selected disabled value="">Seleccionar Año </option>
                    @foreach (range(2017, date('Y')) as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <h5>con:</h5>
        <div class="row">
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Tipo</label>
                <select id="tipoC2" name="" class="form-select" wire:model="tipoSeleccionadoC2">
                    <option selected disabled value="">Seleccionar Tipo Encuesta </option>
                    <option value="Objetivos">Objetivos Educacionales</option>
                    <option value="Atributos">Atributos</option>
                </select>
            </div>
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Carrera</label>
                <select id="carreraC2" name="" class="form-select" wire:model="carreraSeleccionadaC2">
                    <option selected disabled value="">Seleccionar Carrera</option>
                    @foreach ($carreras2 as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->carrera }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Periodo</label>
                <select id="periodoC2" name="" class="form-select" wire:model="periodoSeleccionadoC2">
                    <option selected disabled value="">Seleccionar Periodo </option>
                    <option value="ENE-JUN-">ENE-JUN</option>
                    <option value="VERANO-">VERANO</option>
                    <option value="AGO-DIC-">AGO-DIC</option>
                </select>
            </div>
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Año</label>
                <select id="añoC2" name="" class="form-select" wire:model="añoSeleccionadoC2">
                    <option selected disabled value="">Seleccionar Año </option>
                    @foreach (range(2017, date('Y')) as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    @if ($dataTablaComparativaC1 && $dataTablaComparativaC2)
        <div id="containerComparative" style="width:85%; margin: 5rem auto; "></div>
        <div class="card-stadistics">
            <div class="item item--1">
                <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path fill="#014f86"
                        d="M17 15.245v6.872a.5.5 0 0 1-.757.429L12 20l-4.243 2.546a.5.5 0 0 1-.757-.43v-6.87a8 8 0 1 1 10 0zm-8 1.173v3.05l3-1.8 3 1.8v-3.05A7.978 7.978 0 0 1 12 17a7.978 7.978 0 0 1-3-.582zM12 15a6 6 0 1 0 0-12 6 6 0 0 0 0 12z">
                    </path>
                </svg>
                <span id="span-info" class="text text--1"> {{$tablaC1}} </span>
            </div>
            <div class="item item--2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0L24 0 24 24 0 24z"></path>
                    <path
                        d="M16 16c1.657 0 3 1.343 3 3s-1.343 3-3 3-3-1.343-3-3 1.343-3 3-3zM6 12c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zm10 6c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1zM6 14c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm8.5-12C17.538 2 20 4.462 20 7.5S17.538 13 14.5 13 9 10.538 9 7.5 11.462 2 14.5 2zm0 2C12.567 4 11 5.567 11 7.5s1.567 3.5 3.5 3.5S18 9.433 18 7.5 16.433 4 14.5 4z"
                        fill="#014f86"></path>
                </svg> <span class="quantity"> {{count($encuestasC1)}} </span>
                <span class="text text--2"> Encuestas </span>
            </div>
            <div class="item item--3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#014f86"
                        d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                    </path>
                </svg>
                <span class="quantity"> {{count($evaluadoresC1)}} </span>
                <span class="text text--3"> Evaluadores </span>
            </div>
        </div>
        <div class="card-stadistics">
            <div class="item item--1">
                <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0z" fill="none"></path>
                    <path fill="#014f86"
                        d="M17 15.245v6.872a.5.5 0 0 1-.757.429L12 20l-4.243 2.546a.5.5 0 0 1-.757-.43v-6.87a8 8 0 1 1 10 0zm-8 1.173v3.05l3-1.8 3 1.8v-3.05A7.978 7.978 0 0 1 12 17a7.978 7.978 0 0 1-3-.582zM12 15a6 6 0 1 0 0-12 6 6 0 0 0 0 12z">
                    </path>
                </svg>
                <span id="span-info" class="text text--1"> {{$tablaC2}} </span>
            </div>
            <div class="item item--2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0L24 0 24 24 0 24z"></path>
                    <path
                        d="M16 16c1.657 0 3 1.343 3 3s-1.343 3-3 3-3-1.343-3-3 1.343-3 3-3zM6 12c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zm10 6c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1zM6 14c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm8.5-12C17.538 2 20 4.462 20 7.5S17.538 13 14.5 13 9 10.538 9 7.5 11.462 2 14.5 2zm0 2C12.567 4 11 5.567 11 7.5s1.567 3.5 3.5 3.5S18 9.433 18 7.5 16.433 4 14.5 4z"
                        fill="#014f86"></path>
                </svg> <span class="quantity"> {{count($encuestasC2)}} </span>
                <span class="text text--2"> Encuestas </span>
            </div>
            <div class="item item--3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="#014f86"
                        d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z">
                    </path>
                </svg>
                <span class="quantity"> {{count($evaluadoresC2)}} </span>
                <span class="text text--3"> Evaluadores </span>
            </div>
        </div>
    @else
        <h2 style="text-align: center">No existen datos a mostrar.</h2>
    @endif
    





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
                printChart: "Imprimir Tabla",
                downloadPNG: "Descargar en PNG",
                downloadJPEG: "Descargar en JPEG",
                downloadPDF: "Descargar en PDF",
                downloadSVG: "Descargar en SVG (Vector de Imagen)",
                downloadCSV: false,
                downloadXLS: "Descargar en .xls",
                // viewData: false
            },
            plotOptions: {
                series: {
                    animation: false
                }
            },
            colors: ['#72efdd', '#5e60ce', '#99d98c', '#144552', '#ff9e00', '#ff4d6d', '#56ab91', '#FFF263', '#c19ee0', '#cc3399']
        });
        var defaultTitleObjetivos = "Promedios Por Objetivos Educacionales";
        var drilldownTitleObjetivos = "Promedios Por Aspectos de ";
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
                            name: @this.tablaC1,
                            data: @this.dataTablaComparativaC1
                        }, {
                            name: @this.tablaC2,
                            data: @this.dataTablaComparativaC2
                        }]
                    });
                    // Esto es para hacer que se vaya al final solo que no se como hacer para que identifique cuando los select de abajo se modificaron
                    // $('html, body').animate({scrollTop: document.body.scrollHeight}, 'fast');
                    //Para ir al principio de la pagina
                    // $('html, body').animate({scrollTop: 0}, 'fast');
                }
            });
        });
    </script>




</div>
