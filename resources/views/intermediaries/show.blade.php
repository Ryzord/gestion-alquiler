@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $intermediary->name }} {{ $intermediary->surname }}
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $intermediary->email }}</p>
            <p><strong>Teléfono:</strong> {{ $intermediary->phone }}</p>
            <p><strong>Comisión:</strong> {{ $intermediary->commission }} %</p>
            <a href="{{ route('intermediaries.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('intermediaries.edit', $intermediary->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('intermediaries.destroy', $intermediary->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
