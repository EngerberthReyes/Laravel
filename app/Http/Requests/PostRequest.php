<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Cambiar a true para que permita usarlo
        return true; 
    }

    public function rules(): array
    {
        return [
            'titulo'    => 'required|string|min:5|max:255',
            'contenido' => 'required|string|min:10|max:255',
        ];
    }

    // Opcional: Personalizar mensajes en español
    public function messages(): array
    {
        return [
            'titulo.required' => '¡El título es obligatorio!',
            'titulo.min'      => 'El título debe tener al menos 5 caracteres.',
            'titulo.max'      => 'El título debe tener máximo 255 caracteres.',
            'contenido.required' => 'No puedes dejar el post vacío.',
            'contenido.min'      => 'El contenido debe tener al menos 10 caracteres.',
            'contenido.max'      => 'El contenido debe tener máximo 255 caracteres.',
        ];
    }
}