<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumaController extends Controller
{
    public function index(Request $request)
    {
        return view('suma', ['res' => null]);
    }

    public function postSumar(Request $request)
    {
        $data = $request->validate([
            'numero_uno' => 'required|numeric',
            'numero_dos' => 'required|numeric',
        ]);

        $resultado = $data['numero_uno'] + $data['numero_dos'];

        // Si llegó aquí, la validación pasó, no necesitas el if ($data)
        return view('suma', ['res' => $resultado]);
    }
}
