<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function crearPost($datos)
    {
        return Post::create($datos);
    }
}
