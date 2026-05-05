<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SumaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/cargar_posts', function () {
    return view('cargar_posts'); 
});

Route::get('/suma', [SumaController::class, 'index'])->name('suma.index');

Route::post('/suma', [SumaController::class, 'postSumar'])->name('suma.postSumar');

// Ruta específica para ver el JSON directamente en el navegador
// URL: http://127.0.0.1:8000/posts/data
Route::get('posts/datos', [PostController::class, 'datos'])->name('posts.datos');

// Ruta normal para las vistas (index, create, etc.)
// URL: http://127.0.0.1:8000/posts
Route::resource('posts', PostController::class);

// Route::post('/suma', [SistemaDeInterfacesController::class, 'sistemainterfaces'])->name('sistema_de_interfaces.post');

/*
Route::post('/suma', function (Request $request) {

    $numUno = $request->input('numero1');
    $numDos = $request->input('numero2');

    $resultado = $numUno + $numDos;

    # echo "La suma es resultado: " . $resultado;

    return view('suma', [
        'res' => $resultado
    ]);
});
*/
