<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transformar el recurso en un array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            // Validación: Asegura que el título exista antes de aplicar strtoupper
            'titulo_post' => $this->titulo ? strtoupper($this->titulo) : 'SIN TÍTULO',

            'contenido' => $this->contenido ?? 'Sin contenido disponible',

            // Validación de fecha: Evita error si created_at es null
            'fecha' => $this->created_at
                ? $this->created_at->format('d-m-Y H:i')
                : 'Fecha no disponible',

            // Bonus: Enlaces útiles (HATEOAS básico)
            'links' => [
                'self' => route('posts.show', $this->id),
            ],
        ];
    }
}
