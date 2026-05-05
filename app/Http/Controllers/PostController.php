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
        $posts = Post::latest()->get();

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
        $posts = Post::latest()->get();

        // Si la petición pide JSON (ej. cabecera Accept: application/json)
    if ($request->wantsJson()) {
        return PostResource::collection($posts);
    }

    return view('posts.index', compact('posts'));
    }

    // 2. Mostrar Formulario de Creación.
    public function create()
    {
        return view('posts.create');
    }

    // 3. Guardar la Información en la Base de Datos (Create)

    public function store(Request $request, PostService $postService)
    {

        $post = $postService->crearPost($request->all());

        if ($request->wantsJson()) {
            return new PostResource($post);
        }

        return redirect()->route('posts.index')->with('success', 'Post creado!');
    
    }

    // 4. Mostrar Formulario de Edición.

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // 5. Actualizar (Update).

    public function update(Request $request, Post $post)
    {
        
        $post->update($request->all());

        $id = str_pad($post->id, 2, "0", STR_PAD_LEFT);

        return redirect()->route('posts.index')
            ->with("success", "El Post con ID {$id} Fue Actualizado Con Éxito.");

    }

    // 6. Eliminar (Delete).

    public function destroy(Request $request, Post $post)
    {

    $post->delete($request->all());

    $id = str_pad($post->id, 2, "0", STR_PAD_LEFT);

    return redirect()->route('posts.index')->with("success", "El Post con ID {$id} Fue Eliminado.");

}

}