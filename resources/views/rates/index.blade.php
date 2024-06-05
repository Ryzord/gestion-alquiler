@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tarifas</h1>
    <a href="{{ route('rates.create') }}" class="btn btn-primary">Crear nueva Tarifa</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>€/noche</th>
                <th>IVA (%)</th>
                <th>Apartamento</th>
                <th>...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rates as $rate)
            <tr>
                <td>{{ $rate->name }}</td>
                <td>{{ $rate->price_per_night }}</td>
                <td>{{ $rate->iva }}</td>
                <td>{{ $rate->apartment->name }}</td>
                <td>
                    <a href="{{ route('rates.show', $rate->id) }}" class="btn btn-info">Detalles</a>
                    <a href="{{ route('rates.edit', $rate->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('rates.destroy', $rate->id) }}" method="POST" style="display:inline-block;">
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
