<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Método nuevo para ver solo los datos
    public function datos()
    {
        $posts = Post::all();

        // Usamos el Resource para que veas la transformación que hiciste
        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        // Por ahora, si alguien entra a /posts/1, lo mandamos al index
        return redirect()->route('posts.index');
    }

    // 1. LISTAR (Read)
    public function index(Request $request)
    {
        $posts = Post::all();

        // Si la petición pide JSON (ej. cabecera Accept: application/json)
        if ($request->wantsJson()) {
            return PostResource::collection($posts);
        }

        // Si es una petición normal de navegador, devuelve la vista
        return view('posts.index', compact('posts'));
    }

    // 2. MOSTRAR FORMULARIO DE CREACIÓN
    public function create()
    {
        return view('posts.create');
    }

    // 3. GUARDAR (Create)
    public function store(Request $request, PostService $postService)
    {
        // Asegúrate de que el archivo app/Services/PostService.php exista
        // y que el namespace sea correcto para evitar el error ClassLoader.
        $post = $postService->crearPost($request->all());

        if ($request->wantsJson()) {
            return new PostResource($post);
        }

        return redirect()->route('posts.index')->with('success', 'Post creado!');
    }

    // 4. MOSTRAR FORMULARIO DE EDICIÓN (Read para Update)
    public function edit(Post $post) // <--- Esto busca el ID automáticamente
    {
        return view('posts.edit', compact('post'));
    }

    // 5. ACTUALIZAR (Update)
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post actualizado!');
    }

    // 6. ELIMINAR (Delete)
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post eliminado!');
    }
}
