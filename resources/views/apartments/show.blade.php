@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $apartment->name }}
        </div>
        <div class="card-body">
            <p><strong>Dirección:</strong> {{ $apartment->address }}</p>
            <p><strong>Localidad:</strong> {{ $apartment->postal_code }} {{ $apartment->city }}</p>
            <p><strong>País:</strong> {{ $apartment->country }}</p>
            <a href="{{ route('apartments.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('apartments.edit', $apartment->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('apartments.destroy', $apartment->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
