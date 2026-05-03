<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo; // Tablas de la Base de Datos
use App\Models\Interfaz;    // Tablas de la Base de Datos
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DispositivoController extends Controller
{
    // Método para ver los dispositivos
    public function index(Request $request): View|JsonResponse
    {
        // Llamamos al modelo correcto
        $dispositivos = Dispositivo::all();

        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'data' => $dispositivos,
            ], 200);
        }

        return view('dispositivos.index', compact('dispositivos'));
    }

    // Método para ver las interfaces
    public function dispositivosPost(Request $request): View|JsonResponse
    {
        // Llamamos al modelo Interfaz que creamos con el comando anterior
        $dispositivos = Interfaz::with('dispositivo')->get(); // 'with' carga el dueño de la interfaz

        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'data' => $interfaces,
            ], 200);
        }

        return view('dispositivos.dispositivosPost', compact('dispositivos'));
    }
}
