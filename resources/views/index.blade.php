<x-layout>
    <x-slot:titulo>Listado de Posts</x-slot:titulo>
    <section class="flex flex-col items-center">
        <section class="w-full max-w-4xl flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
            <h1 class="text-2xl font-bold text-white tracking-tight">Listado de Posts</h1>
            <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-xl hover:bg-blue-500 transition-all shadow-lg text-sm font-bold">
                + Crear Nuevo Post
            </a>
        </section>
        <section class="bg-gray-800 rounded-xl border border-gray-700 shadow-2xl overflow-hidden w-fit mx-auto">
            <section class="overflow-x-auto">
                <table class="border-collapse">
                    <thead>
                        <tr class="bg-gray-700/50 text-gray-400 text-xs uppercase tracking-widest">
                            <th class="p-4 text-left w-16">ID</th>
                            <th class="p-4 text-left">Título</th>
                            <th class="p-4 text-left">Contenido</th>
                            <th class="p-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach($posts as $post)
                        <tr class="hover:bg-gray-700/30 transition-colors text-sm">
                            <td class="p-4 text-gray-500 font-mono whitespace-nowrap">
                                {{ str_pad($post->id, 2, "0", STR_PAD_LEFT) }}
                            </td>
                            <td class="p-4 text-white font-medium min-w-[150px] max-w-[250px] break-words">
                                {{ $post->titulo }}
                            </td>
                            
                            <td class="p-4 text-gray-400 min-w-[200px] max-w-[400px]">
                                <p class="leading-relaxed line-clamp-2">
                                    {{ $post->contenido }}
                                </p>
                            </td>
                            
                            <td class="p-4 whitespace-nowrap">
                                <section class="flex gap-4 justify-center px-2">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500 hover:text-yellow-400 font-semibold transition">
                                        Editar
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('¿Eliminar el Post ID: {{ $post->id }}?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 font-semibold cursor-pointer transition">
                                            Eliminar
                                        </button>
                                    </form>
                                </section>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </section>
    </section>
       <x-slot:scripts>
    </x-slot:scripts>
</x-layout>