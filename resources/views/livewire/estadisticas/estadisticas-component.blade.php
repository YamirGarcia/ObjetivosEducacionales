<div>
    <div class="card-body">
        <div class="row">
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Tipo</label>
                <select name="" id="tipo" class="form-select" wire:model="tipoSeleccionado">
                    <option selected disabled value="">Seleccionar Tipo Encuesta </option>
                    <option value="Objetivos">Objetivos Educacionales</option>
                    <option value="Atributos">Atributos</option>
                </select>
            </div>
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Carrera</label>
                <select name="" id="carrera" class="form-select" wire:model="carreraSeleccionada">
                    <option selected disabled value="">Seleccionar Carrera</option>
                    @foreach ($carreras2 as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->carrera }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Periodo</label>
                <select name="" id="carrera" class="form-select" wire:model="periodoSeleccionado">
                    <option selected disabled value="">Seleccionar Periodo </option>
                    <option value="ENE-JUN-">ENE-JUN</option>
                    <option value="VERANO-">VERANO</option>
                    <option value="AGO-DIC-">AGO-DIC</option>
                </select>
            </div>
            <div class="col-3" style="margin: 0 auto;">
                <label for="">Año</label>
                <select name="" id="año" class="form-select" wire:model="añoSeleccionado">
                    <option selected disabled value="">Seleccionar Año </option>
                    @foreach (range(2017, date('Y')) as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
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
        <h2>No existen datos capturados.</h2>
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
                viewData: false
            }
        });

        

        var defaultTitleObjetivos = "Promedios Por Objetivos Educacionales";
        var drilldownTitleObjetivos = "Promedios Por Aspectos de ";
        document.addEventListener('DOMContentLoaded', () => {
            Livewire.hook('message.processed', (el, component) => {
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
            });
        });
    </script>



</div>
