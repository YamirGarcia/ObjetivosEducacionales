<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') </title>
    <link rel="icon" type="image/png" href="img/tecnm.png" />
    <!-- General CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/cssLogin.css">
    <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
</head>

<body>
    {{-- <div class="imagen-svg">
        <svg class="topography-shape js-shape" preserveAspectRatio="none" width="100%" height="100%" viewBox="0 0 1200 580" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1800, 60) scale(2.8, 2.8) skewX(30) " style="position: relative; z-index: 0; fill: rgb(214, 242, 255);"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1650, 55) scale(2.65, 2.65) skewX(27.5) " style="position: relative; z-index: 1; fill: rgb(199, 225, 243);"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1500, 50) scale(2.5, 2.5) skewX(25) " style="position: relative; z-index: 2; fill: rgb(184, 207, 230);"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1350, 45) scale(2.3499999999999996, 2.3499999999999996) skewX(22.5) " style="position: relative; z-index: 3; fill: rgb(169, 190, 218);"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1200, 40) scale(2.2, 2.2) skewX(20) " style="position: relative; z-index: 4; fill: rgb(154, 173, 206);"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-1050, 35) scale(2.05, 2.05) skewX(17.5) " style="position: relative; z-index: 5; fill: rgb(139, 155, 193);"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-900, 30) scale(1.9, 1.9) skewX(15) " style="position: relative; z-index: 6; fill: rgb(125, 138, 181);"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-750, 25) scale(1.75, 1.75) skewX(12.5) " style="position: relative; z-index: 7; fill: rgb(110, 121, 169);"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-600, 20) scale(1.6, 1.6) skewX(10) " style="position: relative; z-index: 8; fill: rgb(95, 103, 156);"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-450, 15) scale(1.45, 1.45) skewX(7.5) " style="position: relative; z-index: 9; fill: rgb(80, 86, 144);"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-300, 10) scale(1.3, 1.3) skewX(5) " style="position: relative; z-index: 10; fill: rgb(65, 69, 132);"></path>
            <path d="M734.567 34.372c-28.692 61.724-23.266 100.422 16.275 116.094 59.313 23.508 200.347 32.911 259.299 83.906 58.95 50.994 238.697 11.572 269.438-75.95C1310.32 70.9 1365.669-64 1073.808-64c-194.576 0-307.654 32.79-339.24 98.372h-.001z" fill="#FFFA72" fill-rule="nonzero" transform="translate(-150, 5) scale(1.15, 1.15) skewX(2.5) " style="position: relative; z-index: 11; fill: rgb(50, 51, 119);"></path>
        </svg>
    </div> --}}
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
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('web/js/stisla.js') }}"></script>
    <script src="{{ asset('web/js/scripts.js') }}"></script>
    <!-- Page Specific JS File -->
</body>

</html>
