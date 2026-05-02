@extends('layouts/app')

@section('contenido')

<table>
    @foreach($interfaces as $interfaz)
    <p>{{ $interfaz->nombre }}</p>
    @endforeach
</table>

@endsection