<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    /**
     * Crear un nuevo post.
     */
    public function crearPost(array $data): Post
    {
        return Post::create($data);
    }

    /**
     * Actualizar un post existente.
     */
    public function editarPost(Post $post, array $data): bool
    {
        return $post->update($data);
    }
}