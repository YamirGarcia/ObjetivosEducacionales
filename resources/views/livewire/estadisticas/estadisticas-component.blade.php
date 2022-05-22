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
                        <option value="{{ $carrera->id }}">{{ $carrera->carrera}}</option>
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
    @else
        <h2 style="text-align: center">No existen datos a mostrar.</h2>
    @endif
    {{-- @foreach ($objetivos as $item)
        {{$item}}    
    @endforeach --}}
    {{-- {{$objetivos}} --}}

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
                viewData: false
            },
            plotOptions: {
                series: {
                    animation: false
                }
            }
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
                        credits: {
                            enabled: false
                        },
                        series: [{
                            name: carrerac1S + " | " + periodoc1S + "-" + añoc1S,
                            data: @this.dataTablaComparativaC1
                        }, {
                            name: carrerac2S + " | " + periodoc2S + "-" + añoc2S,
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
