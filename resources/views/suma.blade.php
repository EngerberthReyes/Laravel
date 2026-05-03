@extends('layouts.app')

@section('contenido')

<h1>Sumar dos numeros</h1>
<form action="{{ route('suma.postSumar') }}" method="POST" class="flex gap-2">
    @csrf

    <input type="number" name="numero_uno" value="{{ old('numero_uno') }}" required>
    <input type="number" name="numero_dos" value="{{ old('numero_dos') }}" required>

    <button type="submit">Sumar</button>
</form>

@if(isset($res))
<p>Resultado: {{ $res }}</p>
@elseif(session()->has('resultado'))
{{-- En caso de que pases el dato vía session() como en tu código anterior --}}
<p>Resultado desde sesión: {{ session('resultado') }}</p>
@else
<p>Aún no se ha realizado ninguna operación.</p>
@endif

@endsection