<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- Boostrap 5.1 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/iziToast.min.css') }}">
    <link href="{{ asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    
    @yield('page_css')
    <!-- Template CSS -->
    
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/components.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    @yield('page_css')
    {{-- FONTS  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    @yield('estilos')
    @yield('css_login')
    <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
    <style>
        .nav-bar{
            position: fixed;
            z-index: 3000;
            background: #11101d;
        }
        .modal{
            top: 50px
        }
    </style>
    @livewireStyles
</head>
<style>
    /* Estilos generales */
    a,
p,
h1,
h2,
h3,
h4,
h5,
button,
label,
span,
tr,
th,
td {
    font-family: 'Poppins', sans-serif;
}

body {
    background: #f8f9fa;
}
    /* Boton flotante */
    .btn-flotante {
    font-size: 16px;
    /* Cambiar el tamaÃ±o de la tipografia */
    text-transform: uppercase;
    /* Texto en mayusculas */
    font-weight: bold;
    /* Fuente en negrita o bold */
    color: #ffffff;
    /* Color del texto */
    text-decoration: none;
    font-family: Poppins;
    border-radius: 5px;
    /* Borde del boton */
    letter-spacing: 2px;
    /* Espacio entre letras */
    background-color: #2c2fa5;
    /* Color de fondo */
    padding: 18px 30px;
    /* Relleno del boton */
    position: fixed;
    bottom: 50px;
    right: 50px;
    transition: all 300ms ease 0ms;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
    z-index: 99;
}

.btn-flotante:hover {
    background-color: #ffffff;
    /* Color de fondo al pasar el cursor */
    color: #2c2fa5;
    box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
    border: 1px solid #2c2fa5;
    transform: translateY(-7px);
    text-decoration: none;
}


/* iconos */
.btn-tabla{
    padding-left: 1px;
    border: none; 
    background: none;
}

.acciones {
    margin-top: 5px;
    margin-bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    right: 1%;
    top: 0;
}

.container {
    display: table;
    height: 95vh;
    width: 90%;
    padding-bottom: 5vh;
    margin: auto auto;
    @media (max-width: 900px) {}
    background: #2d2c3e;
    z-index: -1;
}

.content {
    display: table-cell;
    text-align: center;
    vertical-align: middle;
}

.icon-container {
    margin-top: 30px;
    width: 100%;
    height: 60px;
}

.icon {
    background: none;
    cursor: pointer;
    position: relative;
    display: inline-block;
    width: 55px;
    height: 55px;
    margin-left: 60px/5;
    margin-right: 60px/5;
    border-radius: 60px*.5;
    overflow: hidden;
}

.icon::before,
.icon::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    transition: all 0.25s ease;
    border-radius: 60px*.5;
}

i {
    position: relative;
    top: 30%;
    color: #FFFFFF;
    font-size: 40px/2;
    margin-top: 40px/4;
    transition: all 0.25s ease;
}

svg {
    position: relative;
    fill: black;
    height: 40%;
    margin-top: 40px/4;
    transition: all 0.25s ease;
}

.svg {
    position: relative;
    fill: black;
    height: 40%;
    margin-top: -25px;
    margin-left: 17px;
    transition: all 0.25s ease;
}
.svg-delete{
    position: relative;
    fill: black;
    height: 40%;
    margin-top: -24px;
    transition: all 0.25s ease;
}

.edit-fill::before {
    transition-duration: 0.5s;
    box-shadow: inset 0 0 0 2px #0096c7;
    border-radius: 50px;
}

.edit-fill:hover::before {
    box-shadow: inset 0 0 0 60px #0096c7;
    border-radius: 50px;
    fill: white;
}

.trash-fill::before {
    transition-duration: 0.5s;
    box-shadow: inset 0 0 0 2px #e5383b;
    border-radius: 50px;
}

.trash-fill:hover::before {
    box-shadow: inset 0 0 0 60px #e5383b;
    border-radius: 50px;
}

.search-fill::before {
    transition-duration: 0.2s;
    box-shadow: inset 0 0 0 2px #8e9aaf;
    border-radius: 50px;
}

.search-fill:hover::before {
    box-shadow: inset 0 0 0 60px #8e9aaf;
    border-radius: 50px;
}

.create-fill::before {
    transition-duration: 0.2s;
    box-shadow: inset 0 0 0 2px #56ab91;
    border-radius: 50px;
}

.create-fill:hover::before {
    box-shadow: inset 0 0 0 60px #56ab91;
    border-radius: 50px;
}

.objetivos-fill::before {
    transition-duration: 0.2s;
    box-shadow: inset 0 0 0 2px #ff8800;
    border-radius: 50px;
}

.objetivos-fill:hover::before {
    box-shadow: inset 0 0 0 60px #ff8800;
    border-radius: 50px;
}

.atributos-fill::before {
    transition-duration: 0.2s;
    box-shadow: inset 0 0 0 2px #c77dff;
    border-radius: 50px;
}

.atributos-fill:hover::before {
    box-shadow: inset 0 0 0 60px #c77dff;
    border-radius: 50px;
}

/* Tabla */


.limiter {
    width: 100%;
    margin: 0 auto;
}
.container-table100 {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
}

.wrap-table100 {
    width: 1170px;
}

table {
    border-spacing: 1;
    border-collapse: collapse;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    width: 100%;
    margin: 0 auto;
    position: relative;
}

table * {
    position: relative;
}

table td,
table th {
    padding-left: 8px;
}

table thead tr {
    height: 60px;
    background: #36304a;
}

table tbody tr {
    height: 50px;
}

table tbody tr:last-child {
    border: 0;
}

table td,
table th {
    text-align: left;
}

table td.l,
table th.l {
    text-align: right;
}

table td.c,
table th.c {
    text-align: center;
}

table td.r,
table th.r {
    text-align: center;
}

.table100-head th {
    font-family: OpenSans-Regular;
    font-size: 18px;
    color: #fff;
    line-height: 1.2;
    font-weight: unset;
}

.table100-head-modal th {
    font-family: OpenSans-Regular;
    font-size: 18px;
    color: #fff;
    line-height: 1.2;
    font-weight: unset;
}

tbody tr:nth-child(even) {
    background-color: #f5f5f5;
}

tbody tr {
    font-family: OpenSans-Regular;
    font-size: 15px;
    color: black;
    line-height: 1.2;
    font-weight: unset;
}

tbody tr:hover {
    color: #555555;
    background-color: #f5f5f5;
    cursor: pointer;
}

.column1 {
    width: 10%;
    text-align: center;
}
.column1-modal {
    width: 10%;
    text-align: center;
}

.column2 {
    width: 60%;
    text-align: center;
}
.column2-modal {
    width: 20%;
    text-align: center;
}
.column2-modal-objetivos-atributos {
    width: 90%;
    text-align: center;
}

.column3 {
    width: 30%;
    text-align: center;
}
.column3-modal {
    width: 15%;
    text-align: center;
}

.column4 {
    width: 20%;
    text-align: center;
}
.column4-modal {
    width: 40%;
    text-align: center;
}

.column5 {
    width: 30%;
    text-align: center;
}
.column5-modal {
    width: 15%;
    text-align: center;
}

.column6 {
    width: 222px;
    text-align: center;
    padding-right: 62px;
}

@media screen and (max-width: 992px) {
    .tabla-general {
        display: block;
    }
    .tabla-general>*,
    .tabla-general tr,
    .tabla-general td,
    .tabla-general th {
        display: block;
    }
    .tabla-general thead {
        display: none;
    }
    .tabla-general tbody tr {
        height: auto;
        padding: 37px 0;
    }
    .tabla-general tbody tr td {
        padding-left: 40% !important;
        margin-bottom: 24px;
        width: 100%;
        align-items: center;
    }
    .tabla-general tbody tr td:last-child {
        margin-bottom: 0;
    }
    .tabla-general tbody tr td:before {
        font-size: 14px;
        color: #999999;
        line-height: 1.2;
        font-weight: unset;
        position: absolute;
        width: 40%;
        left: 30px;
        top: 0;
    }
    .tabla-general tbody tr td:nth-child(1):before {
        content: "Carrera";
    }
    .tabla-general tbody tr td:nth-child(2):before {
        content: "Plan de estudios:";
    }
    .tabla-general tbody tr td:nth-child(3):before {
        content: "Propiedades";
    }
    .tabla-general tbody tr td:nth-child(4):before {
        content: "Acciones";
    }
    .tabla-general tbody tr td:nth-child(5):before {
        content: "Acciones";
    }
    .tabla-general tbody tr td:nth-child(6):before {
        content: "Total";
    }
    .tabla-general.column1,
    .tabla-general.column2,
    .tabla-general.column6 {
        text-align: center;
    }
    .tabla-general.column4,
    .tabla-general.column5,
    .tabla-general.column6,
    .tabla-general.column1,
    .tabla-general.column2,
    .tabla-general.column3 {
        width: 100%;
    }
    .tabla-general tbody tr {
        font-size: 14px;
    }
}

@media (max-width: 576px) {
    .container-table100 {
        padding-left: 15px;
        padding-right: 15px;
    }
}
    
</style>
<body style="overflow: scroll">
    <div class="" id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg" style="background: #11101d;"></div>
            <nav class="navbar navbar-expand-lg main-navbar nav-bar">
                @include('layouts.header')
            </nav>
            <div class="main-sidebar main-sidebar-postion">
                @include('layouts.sidebar')
            </div>
            <div class="main-content">
                @livewire('objetivos.aspectos-objetivos-component', ['idObj' => $id])
            </div>
            <footer class="main-footer" style="border: none">
                @include('layouts.footer')
            </footer>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    @include('profile.change_password')
    @include('profile.edit_profile')
    @livewireScripts
    @stack('js')
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
<script>
    let loggedInUser = @json(\Illuminate\Support\Facades\Auth::user());
    let loginUrl = '{{ route('login')}}';
    const userUrl = '{{url('users')}}';
    // Loading button plugin (removed from BS4)
    (function($) {
        $.fn.button = function(action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));
</script>
</html>
