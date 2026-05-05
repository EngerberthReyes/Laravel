<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo ?? 'Suma' }} {{-- @yield('titulo', 'Gestión de Posts') --}}</title>
    <link rel="shortcut icon" href="{{ asset('Imagenes/Pergamino.png') }}" type="image/png">
    <script src="{{ asset('js/tailwindcss.js') }}"></script>
    @stack('styles')
</head>
<!-- Comentario -->
<body class="bg-gray-900 text-gray-100 min-h-screen flex items-center justify-center p-4">
    
    <section class="w-full max-w-4xl bg-gray-800 p-6 rounded-lg shadow-xl border border-gray-700">
        
        {{-- Mensaje Global de Éxito --}}
        @if(session('success'))
            <section class="bg-green-900/30 border border-green-500 text-green-400 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </section>
        @endif

        {{-- Aquí se inyectará el contenido --}}
        @yield('contenido')

    </section>

    {{-- Espacio para scripts específicos de cada página --}}
    @stack('scripts')
</body>
</html>