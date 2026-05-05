@extends('layouts.app')

{{-- @section('title', 'Sumar Números') Tambien Funciona Para Que Salga Como Título en el Layout --}}

@section('contenido')

@push('styles')
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endpush

<section class="text-center mb-8">
    <h1 class="text-3xl font-extrabold text-white tracking-tight">Calculadora Simple</h1>
    <p class="text-gray-400 mt-2">Introduce dos valores para obtener la suma</p>
</section>

<form action="{{ route('suma.postSumar') }}" method="POST" class="flex flex-col md:flex-row gap-4 items-end justify-center">
    @csrf

    <section class="w-full md:w-auto">
        <label class="block text-xs font-semibold text-gray-500 uppercase mb-1 ml-1">Número 1</label>
        <input type="number" name="numero_uno" value="{{ old('numero_uno') }}" required
            class="w-full bg-gray-900 border border-gray-700 p-3 rounded-xl text-white outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-600"
            placeholder="0">
    </section>

    <section class="w-full md:w-auto text-gray-500 pb-3 hidden md:block">
        <span class="text-2xl">+</span>
    </section>

    <section class="w-full md:w-auto">
        <label class="block text-xs font-semibold text-gray-500 uppercase mb-1 ml-1">Número 2</label>
        <input type="number" name="numero_dos" value="{{ old('numero_dos') }}" required
            class="w-full bg-gray-900 border border-gray-700 p-3 rounded-xl text-white outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all placeholder-gray-600"
            placeholder="0">
    </section>

    <button type="submit" 
        class="w-full md:w-auto bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-blue-900/20 transition-all active:scale-95">
        Sumar
    </button>
</form>

<section class="mt-10 pt-6 border-t border-gray-700 flex justify-center">
    @if(isset($res))
        <section class="bg-gray-900 border border-blue-500/50 px-6 py-4 rounded-2xl">
            <span class="text-gray-400 mr-2 italic">Resultado:</span>
            <span class="text-3xl font-mono font-bold text-blue-400">{{ $res }}</span>
        </section>
    @elseif(session()->has('resultado'))
        <section class="bg-gray-900 border border-blue-500/50 px-6 py-4 rounded-2xl">
            <span class="text-gray-400 mr-2 italic">Resultado:</span>
            <span class="text-3xl font-mono font-bold text-blue-400">{{ session('resultado') }}</span>
        </section>
    @else
        <section class="flex items-center text-gray-500 italic">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Esperando operación...
        </section>
    @endif
</section>

@endsection