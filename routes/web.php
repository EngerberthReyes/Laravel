<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SistemaDeInterfacesController;
use App\Http\Controllers\SumaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/suma', [SumaController::class, 'index'])->name('suma.index');

Route::post('/suma', [SumaController::class, 'sumar'])->name('suma.post');

Route::get('/sistema_de_interfaces', [SistemaDeInterfacesController::class, 'index'])->name('sistema_de_interfaces.index');

Route::post('/sistema_de_interfaces', [SistemaDeInterfacesController::class, 'sistemainterfaces'])->name('sistema_de_interfaces.post');

# Route::post('/suma', [SistemaDeInterfacesController::class, 'sistemainterfaces'])->name('sistema_de_interfaces.post');

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