<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumaController extends Controller
{
    public function index(Request $request)
    {
        return view('suma', ['res' => null, "titulo" => "Una Suma Normal"]);
    }

    public function postSumar(Request $request)
    {
        $data = $request->validate([
            'numero_uno' => 'required|numeric',
            'numero_dos' => 'required|numeric',
        ]);

        $resultado = $data['numero_uno'] + $data['numero_dos'];

        return view('suma', ['res' => $resultado, "titulo" => "Una Suma Normal"]);
    }
}
