<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') </title>
    <link rel="icon" type="image/png" href="img/tecnm.png" />
    <!-- General CSS Files -->
    <link href="{{ secure_asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ secure_asset('css/font-awesome.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ secure_asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('web/css/components.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/iziToast.min.css') }}">
    <link href="{{ secure_asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/cssLogin.css">
    <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
</head>

<body>
    
    <div class="wrapper">
        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- <div class="login"> -->
    <div id="app">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="login">
                        <h1 style="position: absolute; top: 0; left:15%; width: 70%; top: 35px; font-size: 60px; color: white; text-align: center;">Bienvenido</h1> 
                        <div class="login-brand">
                            <div class="login__fondousuario">
                                <img class="login__fondousuario-icono"
                                    src="https://www.seekpng.com/png/full/138-1388073_login-icons-user-flat-icon-png.png" />
                            </div>
                        </div>
                        @yield('content')
                        <div class="simple-footer">
                            {{-- Copyright &copy; {{ getSettingValue('application_name') }} {{ date('Y') }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div style="position: absolute; bottom: 0;">
            <a href="{{ url('/home') }}" class="small-sidebar-text">
                <img class="navbar-brand-full" src="https://itesainvestigacion.weebly.com/uploads/6/5/9/7/65970875/logo-tecnm-2018_orig.png" width="500px" alt=""/>
            </a>
        </div>
    </div>
    <!-- </div> -->

    <!-- General JS Scripts -->
    <script src="{{ secure_asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ secure_asset('assets/js/jquery.nicescroll.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ secure_asset('web/js/stisla.js') }}"></script>
    <script src="{{ secure_asset('web/js/scripts.js') }}"></script>
    <!-- Page Specific JS File -->
</body>

</html>
