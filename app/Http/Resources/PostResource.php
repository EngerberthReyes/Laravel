<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;

class PostResource extends JsonResource
{
    /**
     * Transformar el recurso en un array.
     */

public function toArray(Request $request): array
{
    // Creamos un validador para los datos del modelo actual ($this)
    $validator = Validator::make($this->resource->toArray(), [
        'titulo' => 'required|string|min:5|max:255',
        'contenido' => 'required',
    ]);

    return [
        'id' => $this->id,
        'titulo_post' => $validator->fails() 
            ? 'TÍTULO INVÁLIDO' 
            : strtoupper($this->titulo),

        'contenido' => $this->contenido ?? 'Sin contenido',
        'fecha' => $this->created_at?->format('d-m-Y') ?? 'N/A',
        'esta_completo' => !$validator->fails(),
    ];
}
}
