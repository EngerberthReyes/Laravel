<?php

namespace App\Http\Controllers;

use App\Models\SistemadeInterfaces;
use Illuminate\Http\Request;

class SistemaDeInterfacesController extends Controller
{
    public function index(Request $request)
    {
        $interfaces = SistemadeInterfaces::all();

        return view('sistema_de_interfaces/index', compact('interfaces'));
    }

    public function sistemainterfaces(Request $request)
    {
        $interfaces = SistemadeInterfaces::all();

        return view('sistema_de_interfaces', compact('interfaces'));
    }
}
