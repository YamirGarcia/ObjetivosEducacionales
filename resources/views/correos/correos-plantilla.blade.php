<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$correo ['title']}}</h1>
    <h1>{{$correo ['body']}}</h1>
    <h1>{{$correo ['token']}}</h1>
    {{-- <h1>{{$correo ['idUsuario']}}</h1> --}}
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, nisi quam? Saepe nihil ipsum beatae consequuntur, eum labore consectetur minus asperiores placeat voluptatibus autem exercitationem pariatur! Amet fugit a tempore!</p>
    Porfavor ingresa al siguiente link para agregar su nueva contraseña <br>
    <a href="{{route('ingresarNuevaContraseña', $correo['token'] )}}">Recuperar contraseña</a>
</body>
</html>