<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ secure_asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- Boostrap 5.1 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Ionicons -->
    <link href="//fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="{{ secure_asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/iziToast.min.css') }}">
    <link href="{{ secure_asset('assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('page_css')
    <!-- Template CSS -->
    
    <link rel="stylesheet" href="{{ secure_asset('web/css/style.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('web/css/components.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    @yield('page_css')
    {{-- FONTS  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    @yield('estilos')
    @yield('css_login')
    <link rel="stylesheet" type="text/css" href="/css/iconos.css">
    <link rel="stylesheet" type="text/css" href="/css/estiloFinalAspecto.css">
    <link rel="stylesheet" type="text/css" href="/css/estilosGenerales.css">
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
<script src="{{ secure_asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ secure_asset('assets/js/popper.min.js') }}"></script>
<script src="{{ secure_asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ secure_asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ secure_asset('assets/js/iziToast.min.js') }}"></script>
<script src="{{ secure_asset('assets/js/select2.min.js') }}"></script>
<script src="{{ secure_asset('assets/js/jquery.nicescroll.js') }}"></script>

<!-- Template JS File -->
<script src="{{ secure_asset('web/js/stisla.js') }}"></script>
<script src="{{ secure_asset('web/js/scripts.js') }}"></script>
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
