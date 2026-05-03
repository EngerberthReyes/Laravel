<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Posts</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-family: sans-serif; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .table-header th {
            background-color: #f2f2f2;
            color: #000000;
        }
        th { background-color: #f4f4f4; }
        tr:hover { background-color: #f9f9f9;
        color: #000000 }
        .error-msg { color: red; font-weight: bold; }
    </style>
</head>

<body>
    <h1>Inicio, soy una página de inicio</h1>

    <div id="status">Cargando datos...</div>

    <table id="tabla-posts" style="display:none;">
        <thead>
            <tr class="table-header">
                <th>ID</th>
                <th>Título (Transformado)</th>
                <th>Contenido</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody id="contenido-tabla"></tbody>
    </table>

    <script>
        // Definimos una función asíncrona para usar try/catch
        async function cargarPosts() {
            const statusDiv = document.getElementById('status');
            const tabla = document.getElementById('tabla-posts');
            const cuerpoTabla = document.getElementById('contenido-tabla');

            try {
                // 1. Realizar la petición
                const respuesta = await fetch('http://127.0.0.1:8000/posts/datos', {
                    headers: { 'Accept': 'application/json' }
                });

                // 2. Verificar si la respuesta fue exitosa (status 200-299)
                if (!respuesta.ok) {
                    throw new Error(`Error en el servidor: ${respuesta.status}`);
                }

                // 3. Convertir a JSON
                const res = await respuesta.json();
                const posts = res.data; // Accedemos a la clave 'data' de tu PostResource

                // 4. Renderizar los datos
                if (posts.length === 0) {
                    statusDiv.innerText = "No hay posts disponibles.";
                    return;
                }

                posts.forEach(post => {
                    const fila = `
                        <tr>
                            <td>${post.id}</td>
                            <td><strong>${post.titulo_post}</strong></td>
                            <td>${post.contenido}</td>
                            <td>${post.fecha}</td>
                        </tr>
                    `;
                    cuerpoTabla.insertAdjacentHTML('beforeend', fila);
                });

                // 5. Mostrar tabla y ocultar estado
                statusDiv.style.display = 'none';
                tabla.style.display = 'table';

            } catch (error) {
                // 6. Manejo de errores (red, servidor caído, archivo PostService no encontrado, etc.)
                console.error('Hubo un problema:', error);
                statusDiv.classList.add('error-msg');
                statusDiv.innerText = 'Error: No se pudieron cargar los datos. Verifica la consola.';
            }
        }

        // Ejecutar la función
        cargarPosts();
    </script>
</body>

</html>