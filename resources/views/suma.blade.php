@extends('layouts/app')

@section('contenido')

<h1>Sumar dos numeros</h1>
<form action="{{ route('suma.post') }}" method="POST" class="flex gap-2">
    @csrf

    <input type="number" name="numero_uno" value="{{ old('numero_uno') }}" required>
    <input type="number" name="numero_dos" value="{{ old('numero_dos') }}" required>

    <button type="submit">Sumar</button>
</form>

{{-- Cambiamos $res por session('resultado') --}}
@if(session('resultado') !== null)
<section style="margin-top: 20px;">
    <h1>Resultado Temporal: {{ session('resultado') }}</h1>
</section>
@endif

@if(isset($res))
<p>Resultado Verdadero: {{ $res }}</p>
@endif

@endsection