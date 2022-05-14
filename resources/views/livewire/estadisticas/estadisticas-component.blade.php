<div style="background:rgba(255,255,255,0.5 )">

    <div style="margin: 1rem 1rem">
        <div class="row">
            <div class="col-3">
                <label for="">Carrera</label>
                <select name="" id="carrera" class="form-select" wire:model="carreraSeleccionada">
                    <option selected disabled value="">Seleccionar Carrera</option>
                    @foreach ($carreras2 as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->carrera }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <label for="">Periodo</label>
                <select name="" id="carrera" class="form-select" wire:model="periodoSeleccionado">
                    <option selected disabled value="">Seleccionar Periodo </option>
                    <option value="ENE-JUN-">ENE-JUN</option>
                    <option value="VERANO-">VERANO</option>
                    <option value="AGO-DIC-">AGO-DIC</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Año</label>
                <select name="" id="carrera" class="form-select" wire:model="añoSeleccionado">
                    <option selected disabled value="">Seleccionar Año </option>
                    @foreach (range(2017, date('Y')) as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>

    {{-- rojo verder azul cyan magenta amarillo --}}
    @if ($datos2)
        <div id="container" style="width:85%; margin: 5rem auto; "></div>
        <div id="container2" style="width:85%; margin: 5rem auto; "></div>
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





        document.addEventListener('DOMContentLoaded', () => {
            Livewire.hook('message.processed', (el, component) => {
                console.log(@this.datos2);
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Calificaciones Promedio'
                    },
                    credits: {
                        enabled: false
                    },
                    xAxis: {
                        type: 'category',
                        labels: {
                            rotation: 0,
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Calificación'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: 'Calificación Promedio: <b>{point.y:.1f}</b>'
                    },
                    series: [{
                        colorByPoint: true,
                        name: 'Population',
                        // ----------------------------------- AQUI ES LA DATA --------------------------------------
                        data: @this.datos2,
                        dataLabels: {
                            enabled: true,
                            rotation: 0,
                            color: '#FFFFFF',
                            align: 'center',
                            format: '{point.y:.1f}', // one decimal
                            y: 35, // 10 pixels down from the top
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
                });
                console.log(@this.dataAspectos);
                Highcharts.chart('container2', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        align: 'left',
                        text: 'Objetivos y Aspectos'
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
                                format: '{point.y:.1f}%'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                    },

                    series: [{
                        name: "Browsers",
                        colorByPoint: true,
                        // PRIMERAS COLUMNAS A MOSTRAR
                        data: @this.datos2
                        // [{
                        //         name: "Chrome",
                        //         y: 62.74,
                        //         drilldown: "Chrome" // ID DEL DRILLDOWN SE MUESTRA EN LA NAVEGACION
                        //     },
                        //     {
                        //         name: "Firefox",
                        //         y: 10.57,
                        //         drilldown: "Firefox"
                        //     },
                        //     {
                        //         name: "Internet Explorer",
                        //         y: 7.23,
                        //         drilldown: "Internet Explorer"
                        //     },
                        //     {
                        //         name: "Safari",
                        //         y: 5.58,
                        //         drilldown: "Safari"
                        //     },
                        //     {
                        //         name: "Edge",
                        //         y: 4.02,
                        //         drilldown: "Edge"
                        //     },
                        //     {
                        //         name: "Opera",
                        //         y: 1.92,
                        //         drilldown: "Opera"
                        //     },
                        //     {
                        //         name: "Other",
                        //         y: 7.62,
                        //         drilldown: null
                        //     }
                        // ]
                    }],
                    // ------------------- SUBTABLAS -------------------
                    drilldown: {
                        breadcrumbs: {
                            position: {
                                align: 'right'
                            }
                        },
                        series: @this.dataAspectos
                        // [{
                        //         name: "Chrome", // HOVER PARA CADA BARRA
                        //         id: "objetivo1",
                        //         data: [
                        //               "v65.0",
                        //               [
                        //                 0.1
                        //             ],
                        //             [
                        //                 "v64.0",
                        //                 1.3
                        //             ],
                        //             [
                        //                 "v63.0",
                        //                 54.02
                        //             ],
                        //             [
                        //                 "v62.0",
                        //                 1.4
                        //             ],
                        //             [
                        //                 "v61.0",
                        //                 0.88
                        //             ],
                        //             [
                        //                 "v60.0",
                        //                 0.56
                        //             ],
                        //             [
                        //                 "v59.0",
                        //                 0.45
                        //             ],
                        //             [
                        //                 "v58.0",
                        //                 0.49
                        //             ],
                        //             [
                        //                 "v57.0",
                        //                 0.32
                        //             ],
                        //             [
                        //                 "v56.0",
                        //                 0.29
                        //             ],
                        //             [
                        //                 "v55.0",
                        //                 0.79
                        //             ],
                        //             [
                        //                 "v54.0",
                        //                 0.18
                        //             ],
                        //             [
                        //                 "v51.0",
                        //                 0.13
                        //             ],
                        //             [
                        //                 "v49.0",
                        //                 2.16
                        //             ],
                        //             [
                        //                 "v48.0",
                        //                 0.13
                        //             ],
                        //             [
                        //                 "v47.0",
                        //                 0.11
                        //             ],
                        //             [
                        //                 "v43.0",
                        //                 0.17
                        //             ],
                        //             [
                        //                 "v29.0",
                        //                 0.26
                        //             ]
                        //         ]
                        //     },
                        //     {
                        //         name: "Firefox",
                        //         id: "objetivo2",
                        //         data: [
                        //             [
                        //                 "v58.0",
                        //                 1.02
                        //             ],
                        //             [
                        //                 "v57.0",
                        //                 7.36
                        //             ],
                        //             [
                        //                 "v56.0",
                        //                 0.35
                        //             ],
                        //             [
                        //                 "v55.0",
                        //                 0.11
                        //             ],
                        //             [
                        //                 "v54.0",
                        //                 0.1
                        //             ],
                        //             [
                        //                 "v52.0",
                        //                 0.95
                        //             ],
                        //             [
                        //                 "v51.0",
                        //                 0.15
                        //             ],
                        //             [
                        //                 "v50.0",
                        //                 0.1
                        //             ],
                        //             [
                        //                 "v48.0",
                        //                 0.31
                        //             ],
                        //             [
                        //                 "v47.0",
                        //                 0.12
                        //             ]
                        //         ]
                        //     },
                        //     {
                        //         name: "Internet Explorer",
                        //         id: "Internet Explorer",
                        //         data: [
                        //             [
                        //                 "v11.0",
                        //                 6.2
                        //             ],
                        //             [
                        //                 "v10.0",
                        //                 0.29
                        //             ],
                        //             [
                        //                 "v9.0",
                        //                 0.27
                        //             ],
                        //             [
                        //                 "v8.0",
                        //                 0.47
                        //             ]
                        //         ]
                        //     },
                        //     {
                        //         name: "Safari",
                        //         id: "Safari",
                        //         data: [
                        //             [
                        //                 "v11.0",
                        //                 3.39
                        //             ],
                        //             [
                        //                 "v10.1",
                        //                 0.96
                        //             ],
                        //             [
                        //                 "v10.0",
                        //                 0.36
                        //             ],
                        //             [
                        //                 "v9.1",
                        //                 0.54
                        //             ],
                        //             [
                        //                 "v9.0",
                        //                 0.13
                        //             ],
                        //             [
                        //                 "v5.1",
                        //                 0.2
                        //             ]
                        //         ]
                        //     },
                        //     {
                        //         name: "Edge",
                        //         id: "Edge",
                        //         data: [
                        //             [
                        //                 "v16",
                        //                 2.6
                        //             ],
                        //             [
                        //                 "v15",
                        //                 0.92
                        //             ],
                        //             [
                        //                 "v14",
                        //                 0.4
                        //             ],
                        //             [
                        //                 "v13",
                        //                 0.1
                        //             ]
                        //         ]
                        //     },
                        //     {
                        //         name: "Opera",
                        //         id: "Opera",
                        //         data: [
                        //             [
                        //                 "v50.0",
                        //                 0.96
                        //             ],
                        //             [
                        //                 "v49.0",
                        //                 0.82
                        //             ],
                        //             [
                        //                 "v12.1",
                        //                 0.14
                        //             ]
                        //         ]
                        //     }
                        // ]
                    }
                });
            });
        });
    </script>



</div>
