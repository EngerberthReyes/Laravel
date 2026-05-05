<x-layout>
    <x-slot:titulo>Listado de Posts</x-slot>

    <section class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Listado de Posts</h1>
        <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500 transition shadow-lg">
            + Crear Nuevo Post
        </a>
    </section>

    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-700 text-gray-300">
                <th class="border border-gray-600 p-2 text-left">ID</th>
                <th class="border border-gray-600 p-2 text-left">Título</th>
                <th class="border border-gray-600 p-2 text-left">Contenido</th>
                <th class="border border-gray-600 p-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody class="sectionide-y sectionide-gray-700">
            @foreach($posts as $post)
            <tr class="hover:bg-gray-700/50 transition">
                <td class="border border-gray-700 p-2 text-gray-400">{{ str_pad($post->id, 2, "0", STR_PAD_LEFT) }}</td>
                <td class="border border-gray-700 p-2 font-medium">{{ $post->titulo }}</td>
                <td class="border border-gray-700 p-2 text-gray-400 text-sm">{{ Str::limit($post->contenido, 50) }}</td>
                <td class="border border-gray-700 p-2">
                    <section class="flex gap-3">
                        <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500 hover:text-yellow-400 transition">Editar</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('¿Eliminar Este Post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-400 transition">Eliminar</button>
                        </form>
                    </section>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>