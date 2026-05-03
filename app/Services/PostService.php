<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function crearPost(array $data)
    {
        return Post::create($data);
    }
}
