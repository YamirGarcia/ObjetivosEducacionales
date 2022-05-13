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



</div>
