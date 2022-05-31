@section('estilos')
@endsection

<!DOCTYPE html>
<html lang="es">

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

<body style="overflow-y: scroll;">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- <div class="navbar-bg" style="background: #11101d;"></div>
            <nav class="navbar navbar-expand-lg main-navbar nav-bar">
                @include('layouts.header')
            </nav> --}}
            <!-- Main Content -->
            <div style="margin-top: 2rem">
                @yield('content')
                @include('layouts.fondo')

                <div>
                    <div class="row" style="justify-content: center;">
                        <div class="col-lg-5">
                            <div class="card shadow p-3 mb-5 bg-body rounded" style="border-top:10px solid #562685">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                            <strong>¡Revise los campos!</strong>
                                            @foreach ($errors->all() as $error)
                                                <span class="badge badge-danger">{{ $error }}</span>
                                            @endforeach
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="title">
                                        <h3
                                            style="border-bottom: 1px solid gray; padding-bottom: 1rem; margin-bottom:1rem;">
                                            Registrar Residente</h3>
                                        <p style="margin-bottom: 2rem;"> <b> Porfavor, ingresa los datos solicitados para que posteriormente un administrador pueda aceptar tu petición una vez que tus datos se hayan corroborado. </b></p>
                                    </div>
                                    {!! Form::open(['method' => 'POST', 'route' => ['formularioResidentes.store']]) !!}
                                    <div>
                                        <label for=""
                                            style="padding: .4rem 1rem; background-color: #562685; color:white; margin-right: .5rem">1</label><label
                                            for="nombres"><b> Nombre: </b></label>
                                        <input type="text" class="form-control" name="nombres" id="nombres"
                                            style="margin-bottom: 1rem;" required pattern="[a-zA-Z ]{2,254}">
                                    </div>
                                    <div>
                                        <label for=""
                                            style="padding: .4rem 1rem; background-color: #562685; color:white; margin-right: .5rem">2</label><label
                                            for="apellidos"> <b>Apellidos:</b></label>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos"
                                            style="margin-bottom: 1rem;" required pattern="[a-zA-Z ]{2,254}">
                                    </div>
                                    <div>
                                        <label for=""
                                            style="padding: .4rem 1rem; background-color: #562685; color:white; margin-right: .5rem">3</label><label
                                            for="numeroControl"> <b>Numero de Control: </b></label>
                                        <input type="text" class="form-control" name="numeroControl"
                                            id="numeroControl" style="margin-bottom: 1rem;" required pattern="[0-9]{8}">
                                    </div>
                                    <div>
                                        <label for=""
                                            style="padding: .4rem 1rem; background-color: #562685; color:white; margin-right: .5rem">4</label><label
                                            for="correo"> <b>Correo: </b></label>
                                        <input type="text" class="form-control" name="correo" id="correo"
                                            style="margin-bottom: 1rem;" required
                                            pattern="^[a-z0-9!#$%&'+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&'+/=?^_`{|}~-]+)@(?:[a-z0-9](?:[a-z0-9-][a-z0-9])?.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">
                                    </div>
                                    <div>
                                        <label for=""
                                            style="padding: .4rem 1rem; background-color: #562685; color:white; margin-right: .5rem">5</label><label
                                            for="carrera" required> <b>Carrera: </b></label>

                                        <select class="form-select" name="carrera" id="carrera"
                                            style="margin-bottom: 2rem;">
                                            <option value="" selected disabled></option>
                                            <option value="Administración">Ingenieria en Administración</option>
                                            <option value="Bioquímica">Ingenieria en Bioquímica</option>
                                            <option value="Contador Público">Ingenieria en Contador Público</option>
                                            <option value="Eléctrica">Ingenieria en Eléctrica</option>
                                            <option value="Electrónica">Ingenieria en Electrónica</option>
                                            <option value="Gestión Empresarial">Ingenieria en Gestión Empresarial
                                            </option>
                                            <option value="Industrial">Ingenieria en Industrial</option>
                                            <option value="Materiales">Ingenieria en Materiales</option>
                                            <option value="Mecánica">Ingenieria en Mecánica</option>
                                            <option value="Mecatrónica">Ingenieria en Mecatrónica</option>
                                            <option value="Sistemas Computacionales">Ingenieria en Sistemas
                                                Computacionales</option>
                                            <option value="TICS">Ingenieria en TICS</option>

                                        </select>

                                    </div>

                                    <div class="col-xs-6 col-sm-6 col-md-10">
                                        <button type="submit" class="boton-submit" id="enviarForm">Guardar</button>
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
