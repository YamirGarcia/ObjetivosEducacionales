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
                        <div class="card-body">
                            
                            <div id="carrusel" class="carousel slide" data-ride="carousel" style="width: 620px;">

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

                            <div class="container-button" style="width: 500px;">

                                <div class="card-home ">
                                    <div class="card-img ">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="35" height="35" style="position: relative; right: -60px;"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M319.9 320c57.41 0 103.1-46.56 103.1-104c0-57.44-46.54-104-103.1-104c-57.41 0-103.1 46.56-103.1 104C215.9 273.4 262.5 320 319.9 320zM369.9 352H270.1C191.6 352 128 411.7 128 485.3C128 500.1 140.7 512 156.4 512h327.2C499.3 512 512 500.1 512 485.3C512 411.7 448.4 352 369.9 352zM512 160c44.18 0 80-35.82 80-80S556.2 0 512 0c-44.18 0-80 35.82-80 80S467.8 160 512 160zM183.9 216c0-5.449 .9824-10.63 1.609-15.91C174.6 194.1 162.6 192 149.9 192H88.08C39.44 192 0 233.8 0 285.3C0 295.6 7.887 304 17.62 304h199.5C196.7 280.2 183.9 249.7 183.9 216zM128 160c44.18 0 80-35.82 80-80S172.2 0 128 0C83.82 0 48 35.82 48 80S83.82 160 128 160zM551.9 192h-61.84c-12.8 0-24.88 3.037-35.86 8.24C454.8 205.5 455.8 210.6 455.8 216c0 33.71-12.78 64.21-33.16 88h199.7C632.1 304 640 295.6 640 285.3C640 233.8 600.6 192 551.9 192z"/></svg>
                                        <h4 class="text-center" style="font-size: 65px">{{count(App\Models\User::all())}}</h4>
                                        
                                    </div>
                                    <div class="card-info">
                                        <div class="card-text">
                                            <p class="text-title">Usuarios </p>
                                            <p class="text-subtitle">Ver más</p>
                                        </div>
                                        <div class="card-icon">
                                            <svg viewBox="0 0 28 25">
                                                <path
                                                    d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-home" >
                                    <div class="card-img" style="background-color: steelblue "></div>
                                    <div class="card-info">
                                        <div class="card-text">
                                            <p class="text-title">This is a title</p>
                                            <p class="text-subtitle">This is a subtitle</p>
                                        </div>
                                        <div class="card-icon">
                                            <svg viewBox="0 0 28 25">
                                                <path
                                                    d="M13.145 2.13l1.94-1.867 12.178 12-12.178 12-1.94-1.867 8.931-8.8H.737V10.93h21.339z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

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
