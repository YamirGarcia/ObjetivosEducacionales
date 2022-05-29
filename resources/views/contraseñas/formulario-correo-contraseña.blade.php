<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Correo de Recuperacion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    {{-- <h1>Hello, world!</h1> --}}
    <div class="container">
        <h3>Recuperar Contraseña</h3>
        @if (session('Error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{session('Error')}}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?= session()->forget('Error')?>
        @endif
        @if (session('Exito'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Éxito!</strong> {{session('Exito')}}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?= session()->forget('Exito')?>
        @endif
        @if (session('Duplicado'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>¡Alerta!</strong> {{session('Duplicado')}}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?= session()->forget('Duplicado')?>
        @endif
        <form method="POST" action="{{ route('recuperarContraseñaCorreo') }}">
            @csrf
            <h4>Ingresa tu correo: </h4>
            <input type="email" name="email" id="email" class="form-control" placeholder="Ingresa Correo ">
            <button type="submit" class="btn btn-success">Enviar Correo</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
