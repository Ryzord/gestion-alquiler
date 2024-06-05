@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Intermediaries</h1>
    <a href="{{ route('intermediaries.create') }}" class="btn btn-primary">Añadir nuevo Intermediario</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Comisión (%)</th>
                <th>...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($intermediaries as $intermediary)
            <tr>
                <td>{{ $intermediary->id }}</td>
                <td>{{ $intermediary->name }}</td>
                <td>{{ $intermediary->surname }}</td>
                <td>{{ $intermediary->email }}</td>
                <td>{{ $intermediary->phone }}</td>
                <td>{{ $intermediary->commission }}</td>
                <td>
                    <a href="{{ route('intermediaries.show', $intermediary->id) }}" class="btn btn-info">Detalles</a>
                    <a href="{{ route('intermediaries.edit', $intermediary->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('intermediaries.destroy', $intermediary->id) }}" method="POST" style="display:inline-block;">
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
