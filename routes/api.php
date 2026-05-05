<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// 1. La ruta que carga la página (el contenedor)
Route::get('/cargar_posts', function () {
    return view('cargar_posts'); 
});

Route::get('posts/datos', [PostController::class, 'datos'])->name('posts.datos');


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
