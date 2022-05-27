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

                            <div class="container">
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
                                                <h5>Ingenieria Tecnologias de la Información y Comunicaciónes| ENE-JUN 2022
                                                </h5>
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

                                    <button class="btn-metas" type="button" data-target="#carrusel"
                                        data-slide="prev">Atras</button>
                                    <button class="btn-metas" type="button" data-target="#carrusel"
                                        data-slide="next">Siguiente</button>
                                </div>

                                <div class="container-button">

                                    <div class="card-home ">
                                        <div class="card-img bg-card-blue">
                                            <div class="info">
                                                <p class="text-title">Usuarios </p>
                                                <h4 class="text-cent" style="font-size: 40px !important">
                                                    {{ count(App\Models\User::all()) }}</h4>
                                            </div>
                                            <svg class="usuarios" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 640 512">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M319.9 320c57.41 0 103.1-46.56 103.1-104c0-57.44-46.54-104-103.1-104c-57.41 0-103.1 46.56-103.1 104C215.9 273.4 262.5 320 319.9 320zM369.9 352H270.1C191.6 352 128 411.7 128 485.3C128 500.1 140.7 512 156.4 512h327.2C499.3 512 512 500.1 512 485.3C512 411.7 448.4 352 369.9 352zM512 160c44.18 0 80-35.82 80-80S556.2 0 512 0c-44.18 0-80 35.82-80 80S467.8 160 512 160zM183.9 216c0-5.449 .9824-10.63 1.609-15.91C174.6 194.1 162.6 192 149.9 192H88.08C39.44 192 0 233.8 0 285.3C0 295.6 7.887 304 17.62 304h199.5C196.7 280.2 183.9 249.7 183.9 216zM128 160c44.18 0 80-35.82 80-80S172.2 0 128 0C83.82 0 48 35.82 48 80S83.82 160 128 160zM551.9 192h-61.84c-12.8 0-24.88 3.037-35.86 8.24C454.8 205.5 455.8 210.6 455.8 216c0 33.71-12.78 64.21-33.16 88h199.7C632.1 304 640 295.6 640 285.3C640 233.8 600.6 192 551.9 192z" />
                                            </svg>

                                        </div>
                                        <div class="card-info">
                                            <div class="card-text">
                                                <p class="text-subtitle">Ver más...</p>
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
                                    <div class="card-home ">
                                        <div class="card-img bg-card-blue-2">
                                            <div class="info">
                                                <p class="text-title">Carreras </p>
                                                <h4 class="text-cent" style="font-size: 40px !important">
                                                    {{ count(App\Models\User::all()) }}</h4>
                                            </div>
                                            <svg class="carreras" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 640 512">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M320 128C328.8 128 336 135.2 336 144V160H352C360.8 160 368 167.2 368 176C368 184.8 360.8 192 352 192H320C311.2 192 304 184.8 304 176V144C304 135.2 311.2 128 320 128zM476.8 98.06L602.4 125.1C624.4 130.9 640 150.3 640 172.8V464C640 490.5 618.5 512 592 512H48C21.49 512 0 490.5 0 464V172.8C0 150.3 15.63 130.9 37.59 125.1L163.2 98.06L302.2 5.374C312.1-1.791 327-1.791 337.8 5.374L476.8 98.06zM256 512H384V416C384 380.7 355.3 352 320 352C284.7 352 256 380.7 256 416V512zM96 192C87.16 192 80 199.2 80 208V272C80 280.8 87.16 288 96 288H128C136.8 288 144 280.8 144 272V208C144 199.2 136.8 192 128 192H96zM496 272C496 280.8 503.2 288 512 288H544C552.8 288 560 280.8 560 272V208C560 199.2 552.8 192 544 192H512C503.2 192 496 199.2 496 208V272zM96 320C87.16 320 80 327.2 80 336V400C80 408.8 87.16 416 96 416H128C136.8 416 144 408.8 144 400V336C144 327.2 136.8 320 128 320H96zM496 400C496 408.8 503.2 416 512 416H544C552.8 416 560 408.8 560 400V336C560 327.2 552.8 320 544 320H512C503.2 320 496 327.2 496 336V400zM320 88C271.4 88 232 127.4 232 176C232 224.6 271.4 264 320 264C368.6 264 408 224.6 408 176C408 127.4 368.6 88 320 88z" />
                                            </svg>

                                        </div>
                                        <div class="card-info">
                                            <div class="card-text">
                                                <p class="text-subtitle">Ver más...</p>
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
                                    <div class="card-home ">
                                        <div class="card-img bg-card-green">
                                            <div class="info">
                                                <p class="text-title-evaluadores"
                                                    style="position: relative; right: -120px">
                                                    Evaluadores</p>
                                                <h4 class="text-cent" style="font-size: 40px !important">
                                                    {{ count(App\Models\User::all()) }}</h4>
                                            </div>
                                            <svg class="evaluadores" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M352 128C352 198.7 294.7 256 224 256C153.3 256 96 198.7 96 128C96 57.31 153.3 0 224 0C294.7 0 352 57.31 352 128zM209.1 359.2L176 304H272L238.9 359.2L272.2 483.1L311.7 321.9C388.9 333.9 448 400.7 448 481.3C448 498.2 434.2 512 417.3 512H30.72C13.75 512 0 498.2 0 481.3C0 400.7 59.09 333.9 136.3 321.9L175.8 483.1L209.1 359.2z" />
                                            </svg>

                                        </div>
                                        <div class="card-info">
                                            <div class="card-text">
                                                <p class="text-subtitle">Ver más...</p>
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
                                    <div class="card-home ">
                                        <div class="card-img bg-card-green-2">
                                            <div class="info">
                                                <p class="text-title">Encuestas</p>
                                                <h4 class="text-cent" style="font-size: 40px !important">
                                                    {{ count(App\Models\User::all()) }}</h4>
                                            </div>
                                            <svg class="encuestas" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path
                                                    d="M448 416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H384C419.3 32 448 60.65 448 96V416zM256 160C256 142.3 241.7 128 224 128H128C110.3 128 96 142.3 96 160C96 177.7 110.3 192 128 192H224C241.7 192 256 177.7 256 160zM128 224C110.3 224 96 238.3 96 256C96 273.7 110.3 288 128 288H320C337.7 288 352 273.7 352 256C352 238.3 337.7 224 320 224H128zM192 352C192 334.3 177.7 320 160 320H128C110.3 320 96 334.3 96 352C96 369.7 110.3 384 128 384H160C177.7 384 192 369.7 192 352z" />
                                            </svg>

                                        </div>
                                        <div class="card-info">
                                            <div class="card-text">
                                                <p class="text-subtitle">Ver más...</p>
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
