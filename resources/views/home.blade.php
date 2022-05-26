@extends('layouts.app')

@section('estilos')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    {{-- <script src="https://code.highcharts.com/modules/exporting.js"></script> --}}
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estiloDashboard.css">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Bienvenido {{ \Illuminate\Support\Facades\Auth::user()->name }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        <div class="card-body" >
                            <div class="container-button" style="width: 500px;">
                                
                            </div>
                            <div id="carrusel" class="carousel slide" data-ride="carousel" style="width: 420px;">

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="progres-container">
                                            <h5>Ingenieria en sistemas Computacionales | ENE-JUN 2022</h5>
                                            <div class="bar-container">
                                                {{-- <div> --}}
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                {{-- </div> --}}
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-success" style="width: 100%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bar-container">
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-incomplete" style="width: 70%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bar-container">
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-wrong" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bar-container">
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-incomplete" style="width: 63%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="progres-container">
                                            <h5>Ingenieria Tecnologias de la Información y Comunicaciónes| ENE-JUN 2022</h5>
                                            <div class="bar-container">
                                                {{-- <div> --}}
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                {{-- </div> --}}
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-success" style="width: 100%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bar-container">
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-incomplete" style="width: 70%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bar-container">
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-wrong" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bar-container">
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-incomplete" style="width: 63%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="progres-container">
                                            <h5>333333 ENE-JUN 2022</h5>
                                            <div class="bar-container">
                                                {{-- <div> --}}
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                {{-- </div> --}}
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-success" style="width: 100%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bar-container">
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-incomplete" style="width: 70%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bar-container">
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-wrong" style="width: 50%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bar-container">
                                                <p class="texto-objetivo">Aqui va el nombre del objetivo pero pues muy
                                                    grande y
                                                    queiro
                                                    ver como se veria</p>
                                                <p class="texto-valor">4.3</p>
                                                <p class="texto-meta">5</p>
                                                <div class="progres-bar">
                                                    <div class="complete-bar bar-incomplete" style="width: 63%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <button class="carousel-control-prev" type="button" data-target="#carrusel"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-target="#carrusel"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true">
                                    </span>
                                </button> --}}

                                <button class="btn-metas" type="button" data-target="#carrusel"
                                data-slide="prev">Atras</button>
                                <button class="btn-metas" type="button" data-target="#carrusel"
                                data-slide="next">Siguiente</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script>
        var myCarousel = document.getElementById('carrusel');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 1000000,
            pause: true
        })
        /**
         * Get the current time
         */
        function getNow() {
            var now = new Date();

            return {
                hours: now.getHours() + now.getMinutes() / 60,
                minutes: now.getMinutes() * 12 / 60 + now.getSeconds() * 12 / 3600,
                seconds: now.getSeconds() * 12 / 60
            };
        }

        /**
         * Pad numbers
         */
        function pad(number, length) {
            // Create an array of the remaining length + 1 and join it with 0's
            return new Array((length || 2) + 1 - String(number).length).join(0) + number;
        }

        var now = getNow();

        // Create the chart
        Highcharts.chart('container', {

                chart: {
                    type: 'gauge',
                    plotBackgroundColor: null,
                    plotBackgroundImage: null,
                    plotBorderWidth: 0,
                    plotShadow: false,
                    height: '80%'
                },

                credits: {
                    enabled: false
                },

                title: {
                    text: ''
                },

                pane: {
                    background: [{
                        // default background
                    }, {
                        // reflex for supported browsers
                        backgroundColor: Highcharts.svg ? {
                            radialGradient: {
                                cx: 0.5,
                                cy: -0.4,
                                r: 1.9
                            },
                            stops: [
                                [0.5, 'rgba(255, 255, 255, 0.2)'],
                                [0.5, 'rgba(200, 200, 200, 0.2)']
                            ]
                        } : null
                    }]
                },

                yAxis: {
                    labels: {
                        distance: -20
                    },
                    min: 0,
                    max: 12,
                    lineWidth: 0,
                    showFirstLabel: false,

                    minorTickInterval: 'auto',
                    minorTickWidth: 1,
                    minorTickLength: 5,
                    minorTickPosition: 'inside',
                    minorGridLineWidth: 0,
                    minorTickColor: '#666',

                    tickInterval: 1,
                    tickWidth: 2,
                    tickPosition: 'inside',
                    tickLength: 10,
                    tickColor: '#666',
                    title: {
                        text: '',
                        style: {
                            color: '#BBB',
                            fontWeight: 'normal',
                            fontSize: '8px',
                            lineHeight: '10px'
                        },
                        y: 10
                    }
                },

                tooltip: {
                    formatter: function() {
                        return this.series.chart.tooltipText;
                    }
                },

                series: [{
                    data: [{
                        id: 'hour',
                        y: now.hours,
                        dial: {
                            radius: '60%',
                            baseWidth: 4,
                            baseLength: '95%',
                            rearLength: 0
                        }
                    }, {
                        id: 'minute',
                        y: now.minutes,
                        dial: {
                            baseLength: '95%',
                            rearLength: 0
                        }
                    }, {
                        id: 'second',
                        y: now.seconds,
                        dial: {
                            radius: '100%',
                            baseWidth: 1,
                            rearLength: '20%'
                        }
                    }],
                    animation: false,
                    dataLabels: {
                        enabled: false
                    }
                }]
            },

            // Move
            function(chart) {
                setInterval(function() {

                    now = getNow();

                    if (chart.axes) { // not destroyed
                        var hour = chart.get('hour'),
                            minute = chart.get('minute'),
                            second = chart.get('second'),
                            // run animation unless we're wrapping around from 59 to 0
                            animation = now.seconds === 0 ?
                            false : {
                                easing: 'easeOutBounce'
                            };

                        // Cache the tooltip text
                        chart.tooltipText =
                            pad(Math.floor(now.hours), 2) + ':' +
                            pad(Math.floor(now.minutes * 5), 2) + ':' +
                            pad(now.seconds * 5, 2);


                        hour.update(now.hours, true, animation);
                        minute.update(now.minutes, true, animation);
                        second.update(now.seconds, true, animation);
                    }

                }, 1000);

            });

        /**
         * Easing function from https://github.com/danro/easing-js/blob/master/easing.js
         */
        Math.easeOutBounce = function(pos) {
            if ((pos) < (1 / 2.75)) {
                return (7.5625 * pos * pos);
            }
            if (pos < (2 / 2.75)) {
                return (7.5625 * (pos -= (1.5 / 2.75)) * pos + 0.75);
            }
            if (pos < (2.5 / 2.75)) {
                return (7.5625 * (pos -= (2.25 / 2.75)) * pos + 0.9375);
            }
            return (7.5625 * (pos -= (2.625 / 2.75)) * pos + 0.984375);
        };
    </script>
@endsection
