<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo ?? 'Listado de Posts' }}</title>
    <script src="{{ asset('js/tailwindcss.js') }}"></script>
</head>

<body class="bg-gray-900 text-gray-100 min-h-screen flex items-center justify-center p-4">
    
    <section class="w-full max-w-4xl bg-gray-800 p-6 rounded-lg shadow-xl border border-gray-700">
        
        {{-- Contenido inyectado --}}
        {{ $slot }}
        
    </section>
</body>
</html>