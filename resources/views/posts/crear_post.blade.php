<x-layout>
    <x-slot:titulo>Crear Nuevo Post</x-slot>

    <section class="mb-6">
        <h1 class="text-2xl font-bold text-white border-b border-gray-700 pb-2">Crear Nuevo Post</h1>
        <p class="text-gray-400 mt-2">Completa los campos para publicar una nueva entrada.</p>
    </section>

    <form action="{{ route('posts.store') }}" method="POST" class="space-y-6">
        @csrf
        <section>
            <label for="titulo" class="block text-sm font-medium text-gray-300 mb-2">Título del Post</label>
            <input 
                type="text" 
                name="titulo" 
                id="titulo"
                placeholder="Escribe un título llamativo..."
                class="w-full bg-gray-900 border border-gray-700 p-2.5 rounded-lg text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition @error('titulo') border-red-500 @enderror" 
                value="{{ old('titulo') }}"
            >
            @error('titulo') 
                <span class="text-red-400 text-sm mt-1 block italic">{{ $message }}</span> 
            @enderror
        </section>
        <section>
            <label for="contenido" class="block text-sm font-medium text-gray-300 mb-2">Contenido</label>
            <textarea 
                name="contenido" 
                id="contenido" 
                rows="6" 
                placeholder="¿De qué trata este post?"
                class="w-full resize-none bg-gray-900 border border-gray-700 p-2.5 rounded-lg text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition @error('contenido') border-red-500 @enderror"
            >{{ old('contenido') }}</textarea>
            @error('contenido') 
                <span class="text-red-400 text-sm mt-1 block italic">{{ $message }}</span> 
            @enderror
        </section>
        <section class="flex items-center gap-4 pt-4 border-t border-gray-700">
            <button type="submit" class="bg-blue-600 text-white px-8 py-2.5 rounded-lg font-semibold hover:bg-blue-500 transition shadow-lg active:transform active:scale-95">
                Publicar Post
            </button>
            
            <a href="{{ route('posts.index') }}" class="text-gray-400 hover:text-white px-4 py-2.5 transition text-sm font-medium">
                Cancelar y volver
            </a>
        </section>
    </form>
</x-layout>