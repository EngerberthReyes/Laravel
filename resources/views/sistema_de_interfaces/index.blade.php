@extends('layout.app')

@section('contenido')
<section class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($interfaces as $interfaz)
            <tr>
                <td>{{ $interfaz->id }}</td>
                <td>{{ $interfaz->nombre }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection