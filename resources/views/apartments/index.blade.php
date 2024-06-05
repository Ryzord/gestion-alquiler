@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Apartamentos</h1>
    <a href="{{ route('apartments.create') }}" class="btn btn-primary">Añadir nuevo Apartamento</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Localidad</th>
                <th>Código Postal</th>
                <th>País</th>
                <th>...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($apartments as $apartment)
            <tr>
                <td>{{ $apartment->id }}</td>
                <td>{{ $apartment->name }}</td>
                <td>{{ $apartment->address }}</td>
                <td>{{ $apartment->city }}</td>
                <td>{{ $apartment->postal_code }}</td>
                <td>{{ $apartment->country }}</td>
                <td>
                    <a href="{{ route('apartments.show', $apartment->id) }}" class="btn btn-info">Detalles</a>
                    <a href="{{ route('apartments.edit', $apartment->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('apartments.destroy', $apartment->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
