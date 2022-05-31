@section('estilos')
@endsection
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Objetivos Educacionales</title>
    {{-- <link rel="icon" href="img/tecnm.png" type="image/icon type"> --}}
    {{-- <link rel = "icon" href = "" type = "image/x-icon"> --}}
    <link rel="icon" type="image/png" href="img/tecnm.png" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- Boostrap 5.1 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/estilofondo.css">
    <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
    {{-- CDN SELECT 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @yield('page_css')
    <!-- Template CSS -->

    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @yield('page_css')
    {{-- FONTS --}}
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    @yield('estilos')
    @yield('css_login')
</head>
@yield('cssObjetivos')
<style>
    .nav-bar {
        position: fixed;
        z-index: 3000;
        background: #11101d;
    }

    .modal {
        top: 50px
    }

    .section-header {
        position: sticky;
        top: 0;
        /* z-index: 3000; */
    }

</style>

<body>
    {{-- <h1>Hello, world!</h1> --}}
    {{-- <div class="container">
        <h3>Recuperar Contraseña</h3>
        @if (session('Error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('Error') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?= session()->forget('Error') ?>
        @endif
        @if (session('Exito'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Éxito!</strong> {{ session('Exito') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?= session()->forget('Exito') ?>
        @endif
        @if (session('Duplicado'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Alerta!</strong> {{ session('Duplicado') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?= session()->forget('Duplicado') ?>
        @endif
        <form method="POST" action="{{ route('recuperarContraseñaCorreo') }}">
            @csrf
            <h4>Ingresa tu correo: </h4>
            <input type="email" name="email" id="email" class="form-control" placeholder="Ingresa Correo ">
            <button type="submit" class="btn btn-success">Enviar Correo</button>
        </form>
    </div> --}}

    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div style="margin-top: 7rem">
                @yield('content')
                @include('layouts.fondo')

                <div>
                    <div class="row" style="justify-content: center;">
                        <div class="col-lg-5">
                            <div class="card shadow p-3 mb-5 bg-body rounded" style="border-top:10px solid #562685">
                                <div class="card-body">
                                    <div class="title">
                                        @if (session('Error'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>Error!</strong> {{ session('Error') }}.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                            <?= session()->forget('Error') ?>
                                        @endif
                                        @if (session('Exito'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>¡Éxito!</strong> {{ session('Exito') }}.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                            <?= session()->forget('Exito') ?>
                                        @endif
                                        @if (session('Duplicado'))
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>¡Alerta!</strong> {{ session('Duplicado') }}.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                            <?= session()->forget('Duplicado') ?>
                                        @endif
                                        <h3
                                            style="border-bottom: 1px solid gray; padding-bottom: 1rem; margin-bottom:1rem;">
                                            Recuperar Contraseña</h3>
                                        <p style="margin-bottom: 2rem;">
                                            <b> Para poder recuperar tu contraseña en el sistema: </b>
                                        <ol style="font-family: Poppins;">
                                            <b>
                                            <li>Ingresa el correo electrónico con el que tienes acceso al sistema.</li>
                                            <li>Ve a tu bandeja de entrada del correo electrónico ingresado.</li>
                                            <li>Busca el correo con asunto 'Recuperación de Contraseña
                                                Objetivos Educacionales'.</li>
                                            <li>Has click en el enlace dado.</li>
                                            <li>Ingresa y confirma tu nueva contraseña.</li>
                                            </b>
                                        </ol>
                                        </p>
                                    </div>
                                    {!! Form::open(['method' => 'POST', 'route' => ['recuperarContraseñaCorreo']]) !!}
                                    <div>
                                        <label for=""
                                            style="padding: .4rem 1rem; background-color: #562685; color:white; margin-right: .5rem">1</label><label
                                            for="nombres"> <b> Ingresa tu correo electrónico: </b></label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            style="margin-bottom: 1rem;">
                                    </div>


                                    <div class="col-xs-10 col-sm-10 col-md-10">
                                        <button type="submit" class="boton-submit" id="enviarForm">Recuperar</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <footer class="main-footer" style="border: none">
                @include('layouts.footer')

            </footer> --}}
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('js')
</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('web/js/stisla.js') }}"></script>
<script src="{{ asset('web/js/scripts.js') }}"></script>
<script src="{{ mix('assets/js/profile.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>

@yield('page_js')
@yield('scripts')

</html>
