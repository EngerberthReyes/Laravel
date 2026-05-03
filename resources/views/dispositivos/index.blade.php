@extends('layouts.app')

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
            @foreach($dispositivos as $dispositivo)
            <tr>
                <td>{{ $dispositivo->id }}</td>
                <td>{{ $dispositivo->nombre }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection