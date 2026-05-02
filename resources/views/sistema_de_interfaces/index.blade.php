@extends('layouts/app')

@section('contenido')

<table class="table">
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
        @foreach($interfaces as $interfaz)
        <tr>
            <td>{{ $interfaz->id }}</td>
            <td>{{ $interfaz->nombre }}</td>
        </tr>
        @endforeach
    </table>
</table>

@endsection