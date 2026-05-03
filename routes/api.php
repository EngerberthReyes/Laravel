<?php

use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\SumaController;
use Illuminate\Support\Facades\Route;

/*
| Estas rutas ahora son accesibles vía: http://127.0.0.1:8000/api/...
*/

// Ejemplo de ruta de información simple
Route::get('/inicio', function () {
    return response()->json([
        'mensaje' => 'Bienvenido a la API de inicio',
        'status' => 'success',
    ]);
});

// Rutas de Suma
// El método GET suele usarse en APIs para obtener configuraciones o estados
Route::get('/suma', [SumaController::class, 'index']);

// El método POST es el principal para procesar datos
Route::post('/suma', [SumaController::class, 'sumar']);

// Rutas de Interfaces
Route::get('/dispositivos', [DispositivoController::class, 'index']);
