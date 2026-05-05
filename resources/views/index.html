<x-layout>
    <x-slot:title>Lista de Posts JSON</x-slot:title>

    <section class="text-center mb-8">
        <h1 class="text-3xl font-bold text-white">Consumo de API Local</h1>
        <section id="status" class="mt-4 text-blue-400 animate-pulse font-medium">Cargando datos...</section>
    </section>

    <section id="tabla-container" class="hidden overflow-hidden rounded-xl border border-gray-700 shadow-2xl bg-gray-800">
        <section class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-700/50 text-gray-300 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Título</th>
                        <th class="p-4">Contenido</th>
                        <th class="p-4 text-center">Fecha</th>
                    </tr>
                </thead>
                <tbody id="contenido-tabla" class="sectionide-y sectionide-gray-700"></tbody>
            </table>
        </section>
    </section>

    <x-slot:scripts>
    <script>
        async function cargarPosts() {
            const statusSection = document.getElementById('status');
            const container = document.getElementById('tabla-container');
            const cuerpoTabla = document.getElementById('contenido-tabla');

            try {
                const respuesta = await fetch('http://127.0.0.1:8000/posts/datos', {
                    headers: { 'Accept': 'application/json' }
                });

                console.log(respuesta)

                if (!respuesta.ok) throw new Error(`Error: ${respuesta.status}`);

                const posts = await respuesta.json(); // Eliminamos el .data aquí

                if (!Array.isArray(posts) || posts.length === 0) {
                    statusSection.innerText = "No hay posts disponibles.";
                    return;
                }

                posts.forEach(post => {
                    const fila = `
                        <tr class="hover:bg-gray-700/30 transition-colors">
                            <td class="p-4 text-gray-500 font-mono">${String(post.id).padStart(2, '0')}</td>
                            <td class="p-4 text-white font-semibold">${post.titulo_post}</td>
                            <td class="p-4 text-gray-400">${post.contenido}</td>
                            <td class="p-4 text-center text-gray-500 whitespace-nowrap">${post.fecha}</td>
                        </tr>
                    `;
                    cuerpoTabla.insertAdjacentHTML('beforeend', fila);
                });

                statusSection.classList.add('hidden');
                container.classList.remove('hidden');

            } catch (error) {
                console.error(error);
                statusSection.classList.remove('text-blue-400', 'animate-pulse');
                statusSection.classList.add('text-red-500');
                statusSection.innerText = 'Error: No se pudieron cargar los datos.';
            }
        }

        cargarPosts();
    </script>
    </x-slot:scripts>
</x-layout>