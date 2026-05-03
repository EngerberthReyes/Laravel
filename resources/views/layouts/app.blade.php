<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esto es un Template y un Pergamino</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{  asset('Imagenes/Pergamino.png') }}" type="image/png">
</head>

<body>
    <a href="/">Inicio</a>
    <a href="{{  route('suma.index') }}">Suma</a>
<a href="{{ route('posts.index') }}">Posts</a>

    @yield('contenido')

    <h1>Hola Mundo</h1>
</body>

</html>