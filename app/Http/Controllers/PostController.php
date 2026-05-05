<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use App\Http\Requests\PostRequest; 
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function datos()
    {
        $posts = Post::latest()->get();
        return PostResource::collection($posts);
    }

    public function index(Request $request)
    {
        $posts = Post::latest()->get();

        if ($request->wantsJson()) {
            return PostResource::collection($posts);
        }

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.crear_post');
    }

    public function store(PostRequest $request, PostService $postService)
    {
        $post = $postService->crearPost($request->validated());

        if ($request->wantsJson()) {
            return new PostResource($post);
        }

        return redirect()->route('posts.index')
            ->with('exito', '¡Post creado con éxito!');
    }

    public function edit(Post $post)
    {
        return view('posts.editar_post', compact('post'));
    }

    public function update(PostRequest $request, Post $post, PostService $postService)
    {
        $postService->editarPost($post, $request->validated());

        $id = str_pad($post->id, 2, "0", STR_PAD_LEFT);

        return redirect()->route('posts.index')
            ->with("exito", "El Post con ID {$id} fue actualizado con éxito.");
    }

    public function destroy(Post $post)
    {
        $id = str_pad($post->id, 2, "0", STR_PAD_LEFT);
        $post->delete();

        return redirect()->route('posts.index')
            ->with("exito", "El Post con ID {$id} fue eliminado.");
    }

    public function show(Post $post)
    {
        return redirect()->route('posts.index');
    }
}