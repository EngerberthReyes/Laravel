<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo_post' => strtoupper($this->titulo), // Ejemplo de transformación
            'contenido' => $this->contenido,
            'fecha' => $this->created_at->format('d-m-Y'),
        ];
    }
}
