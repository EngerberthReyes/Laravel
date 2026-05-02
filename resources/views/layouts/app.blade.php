<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esto es un Template y un Pergamino</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{  asset('Imagenes/Pergamino.png') }}" type="image/png">
</head>

<body>
    <a href="">Opción A</a>
    <a href="">Opción B</a>
    <a href="">Opcion C</a>

    @yield('contenido_suma')

    <h1>Hola Mundo</h1>
</body>

</html>