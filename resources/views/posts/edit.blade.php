<x-layout>
    <x-slot:titulo>Editar Post</x-slot>

    <h1 class="text-2xl font-bold mb-6 text-white border-b border-gray-700 pb-2">Editar Post #{{ $post->id }}</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        
        <section>
            <label class="block text-gray-400 mb-1">Título:</label>
            <input type="text" name="titulo" 
                class="w-full bg-gray-900 border border-gray-700 p-2 rounded text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition" 
                value="{{ old('titulo', $post->titulo) }}">
            @error('titulo') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
        </section>

        <section>
            <label class="block text-gray-400 mb-1">Contenido:</label>
            <textarea name="contenido" rows="6" 
                class="w-full bg-gray-900 resize-none border border-gray-700 p-2 rounded text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition">{{ old('contenido', $post->contenido) }}</textarea>
            @error('contenido') <span class="text-red-400 text-sm mt-1 block">{{ $message }}</span> @enderror
        </section>

        <section class="flex gap-4 pt-2">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-500 transition shadow-lg">
                Actualizar
            </button>
            <a href="{{ route('posts.index') }}" class="bg-gray-700 text-gray-300 px-6 py-2 rounded hover:bg-gray-600 transition text-center">
                Cancelar
            </a>
        </section>
    </form>
</x-layout>