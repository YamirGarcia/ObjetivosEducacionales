<div style="background:rgba(255,255,255,0.5 )">

    <div style="margin: 1rem 1rem">
        <label for="">Carrera</label>
        <select name="" id="" class="form-select" wire:model="carreraSeleccionada" wire:change="$emit('refrescar')">
            {{-- <option selected disabled>Seleccionar carrera</option> --}}
            @foreach ($carreras2 as $carrera)
                <option value="{{ $carrera->id }}">{{ $carrera->carrera }}</option>
            @endforeach
        </select>
    </div>

    {{ $sumatoria }}
    <br>
    {{ $data }}
    uwu

    <div id="container" style="width:85%; margin: 5rem auto; "></div>

    <div id="container2" style="width:85%; margin: 5rem auto; "></div>

    <div id="container10" style="width:85%; margin: 5rem auto;"></div>


    @push('js')
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

            Livewire.on('refrescar', () => {
                console.log('YASTUVO EL EVENTO DE LA GENTE CAMINANDTE ');


                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Calificaciones Promedio'
                    },
                    // subtitle: {
                    //     text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
                    // },
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
                        data: <?= $data ?>,
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
        </script>
    @endpush

</div>
