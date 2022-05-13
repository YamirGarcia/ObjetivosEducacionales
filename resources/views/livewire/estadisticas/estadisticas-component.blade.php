<div style="background:rgba(255,255,255,0.5 )">

    <div style="margin: 1rem 1rem">
        <label for="">Carrera</label>
        {{-- wire:change="$emit('refrescar')" --}}
        <select name="" id="carrera" class="form-select" wire:model="carreraSeleccionada">
            {{-- <option selected disabled>Seleccionar carrera</option> --}}
            @foreach ($carreras2 as $carrera)
                <option value="{{ $carrera->id }}">{{ $carrera->carrera }}</option>
            @endforeach
        </select>

        <button class="btn btn-success" wire:click=$emit('click')>CLICK</button>
    </div>
    {{-- {{ $contador }} --}}
    <?= $contador ?>
    <br>
    {{ $sumatoria }}
    <br>
    <span> datos --></span> {{ $datos }}
    <br>
    <span> data ---></span> <?= $data ?>


    <button id="inverted">Inverted</button>
    <div id="container" style="width:85%; margin: 5rem auto; "></div>

    {{-- <div id="container2" style="width:85%; margin: 5rem auto; "></div>

    <div id="container10" style="width:85%; margin: 5rem auto;"></div> --}}

    {{-- <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/pattern-fill.js"></script>
    <script src="https://code.highcharts.com/themes/high-contrast-light.js"></script> --}}


    <script>

        const convertir = (cadena) => {
            let newCad = cadena.split(',');
            [[123], [123], [123]]
            ['[123]', '[123]', '[123]']
            newCad[0] = newCad[0].replace('[', '');
            newCad[newCad.length-1] = newCad[newCad.length-1].replace(']', '');
            // console.log('purgao ',newCad);

            newCad = newCad.map( (x) => {
                x = x.replace('[', '');
                x = x.replace(']', '');

                // console.log(Number(x));
                return Number(x);
            });
            return newCad;
            [123,123,123]
        };
        const selectCarrera = document.getElementById('carrera');
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
                
                let informacion =  convertir( @this.datos );
                // let info2 = {{ Js::from($datos) }};
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
                        // AQUI ES LA DATA
                        data: informacion,
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
            });
        });

       

    </script>



            });
        });
    </script>


    <script>
        Highcharts.chart('container2', {
            chart: {
                type: 'column',
                // animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {

                        // set up the updating of the chart each second
                        var series = <?= $nombresObjetivos ?>;
                        // setInterval(function() {
                        //     var x = (new Date()).getTime(), // current time
                        //         y = Math.random();
                        //     series.addPoint([x, y], true, true);
                        // }, 1000);
                    }
                }
            },

            time: {
                useUTC: false
            },

            title: {
                text: 'Live random data'
            },

            accessibility: {
                announceNewData: {
                    enabled: true,
                    minAnnounceInterval: 15000,
                    announcementFormatter: function(allSeries, znewSeries, newPoint) {
                        if (newPoint) {
                            return 'New point added. Value: ' + newPoint.y;
                        }
                        return true;
                    }
                }
            },

            // xAxis: {
            //     type: 'datetime',
            //     tickPixelInterval: 150
            // },
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

            // yAxis: {
            //     title: {
            //         text: 'Value'
            //     },
            //     plotLines: [{
            //         value: 0,
            //         width: 1,
            //         color: '#808080'
            //     }]
            // },
            yAxis: {
                min: 0,
                title: {
                    text: 'Calificación'
                }
            },

            tooltip: {
                headerFormat: '<b>{series.name}</b><br/>',
                pointFormat: '{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}'
            },

            legend: {
                enabled: false
            },

            exporting: {
                enabled: false
            },

            series: [{
                name: 'Random data',
                data: <?= $data ?>,
                // (function() {
                //     // generate an array of random data
                //     var data = [],
                //         time = (new Date()).getTime(),
                //         i;

                //     for (i = 0; i <= 0; i += 1) {
                //         data.push({
                //             x: time + i * 1000,
                //             y: Math.random()
                //         });
                //     }
                //     console.log(data);
                //     return data;
                // }
                // ())
            }]
        });
    </script>
</div>
