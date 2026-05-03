<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Nuevo Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Título:</label>
                <input type="text" name="titulo" class="w-full border p-2 rounded @error('titulo') border-red-500 @enderror" value="{{ old('titulo') }}">
                @error('titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Contenido:</label>
                <textarea name="contenido" rows="5" class="w-full border p-2 rounded @error('contenido') border-red-500 @enderror">{{ old('contenido') }}</textarea>
                @error('contenido') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Guardar</button>
                <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 text-center">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>