<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumaController extends Controller
{
    public function index(Request $request)
    {
        return view('suma', ['res' => null]);
    }

    public function sumar(Request $request)
    {
        $data = $request->validate([
            'numero_uno' => 'required|numeric',
            'numero_dos' => 'required|numeric',
        ]);

        $resultado = $data['numero_uno'] + $data['numero_dos'];

        if ($data && isset($resultado)) {
            return view('suma', ['res' => $resultado]);
        } else {
            return back()
                ->with('resultado', $resultado)
                ->withInput();
        }
    }
}
