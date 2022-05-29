<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cambiar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    {{-- <h1>Hello, world!</h1> --}}
    <div class="container">
        <h3>Recuperar Contraseña | token {{$token}}</h3>
        <form action="{{route('cambiarNuevaContraseña')}}" method="POST">
            @csrf
            <input type="text" name="contraseña1" id="contraseña1" class="form-contro" placeholder="Ingresa Nueva Contraseña: ">
            <input type="password" name="contaseña2" id="contraseña2" placeholder="Confirma Nueva Contraseña: ">
            <input type="text" name="token" id="token" value="{{$token}}" hidden>
            <button type="submit" class="btn btn-success">Cambiar Contraseña</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>