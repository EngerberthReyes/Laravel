<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        // Por ahora, si alguien entra a /posts/1, lo mandamos al index
        return redirect()->route('posts.index');
    }

    // 1. LISTAR (Read)
    public function index()
    {
        $posts = Post::all();

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
        $postService->crearPost($request->all());

        return redirect()->route('posts.index');
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
