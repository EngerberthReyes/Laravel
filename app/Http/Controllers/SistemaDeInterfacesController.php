<?php

namespace App\Http\Controllers;

use App\Models\SistemadeInterfaces;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SistemaDeInterfacesController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $interfaces = SistemadeInterfaces::all();

        // Si la petición pide JSON (desde API o AJAX)
        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json([
                'success' => true,
                'data' => $interfaces,
            ], 200);
        }

        // Si es una petición normal de navegador
        return view('sistema_de_interfaces.index', compact('interfaces'));
    }

    public function sistemainterfaces(Request $request): View|JsonResponse
    {
        $interfaces = SistemadeInterfaces::all();

        if ($request->wantsJson() || $request->is('api/*')) {
            return response()->json($interfaces, 200);
        }

        return view('sistema_de_interfaces.post', compact('interfaces'));
    }
}
