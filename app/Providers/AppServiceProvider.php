<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource; // Importante añadir esto

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Esto quita el "data" de la respuesta inicial
        JsonResource::withoutWrapping();
    }
}