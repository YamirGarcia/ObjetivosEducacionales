<div style="background:rgba(255,255,255,0.5 )">

    <div style="margin: 1rem 1rem">
        <div class="row">
            <div class="col-3">
                <label for="">Carrera</label>
                {{-- wire:change="$emit('refrescar')" --}}
                <select name="" id="carrera" class="form-select" wire:model="carreraSeleccionada">
                    <option selected disabled value="">Seleccionar Carrera</option>
                    @foreach ($carreras2 as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->carrera }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <label for="">Periodo</label>
                {{-- wire:change="$emit('refrescar')" --}}
                <select name="" id="carrera" class="form-select" wire:model="periodoSeleccionado">
                    <option selected disabled value="">Seleccionar Periodo </option>
                    <option value="ENE-JUN-">ENE-JUN</option>
                    <option value="VERANO-">VERANO</option>
                    <option value="AGO-DIC-">AGO-DIC</option>
                </select>
            </div>
            <div class="col-3">
                <label for="">Año</label>
                {{-- wire:change="$emit('refrescar')" --}}
                <select name="" id="carrera" class="form-select" wire:model="añoSeleccionado">
                    <option selected disabled value="">Seleccionar Año </option>
                    @foreach (range(2017, date("Y")) as $year)
                        <option value="{{$year}}">{{$year}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
    </div>



    <button id="inverted">Inverted</button>
    <div id="container" style="width:85%; margin: 5rem auto; "></div>



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

        const convertir = (cadena) => {
            let newCad = cadena.split(',');
            newCad[0] = newCad[0].replace('[', '');
            newCad[newCad.length - 1] = newCad[newCad.length - 1].replace(']', '');

            newCad = newCad.map((x) => {
                x = x.replace('[', '');
                x = x.replace(']', '');

                return Number(x);
            });
            return newCad;
        };

        const convertir2 = (array) => {
            let pares = [];
            for (let i = 0; i < array.length; i += 2) {
                pares.push([array[i], Number(array[i + 1])]);
            }
            console.log(pares);
            return pares;
        };

        document.addEventListener('DOMContentLoaded', () => {
            Livewire.hook('message.processed', (el, component) => {


                let datos = @this.datos;
                let temp = '';


                for (let i = 0; i < datos.length; i++) {
                    if (datos.charAt(i) !== '[' && datos.charAt(i) !== ']') {
                        temp += datos.charAt(i);
                    }
                }

                let informacion = convertir2(temp.split(','));


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
