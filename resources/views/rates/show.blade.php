@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $rate->name }}
        </div>
        <div class="card-body">
            <p><strong>€/noche:</strong> {{ $rate->price_per_night }}</p>
            <p class="card-text"><strong>IVA:</strong> {{ $rate->iva ?? '0' }} %</p>
            <p><strong>Apartamento:</strong> {{ $rate->apartment->name }}</p>
            <a href="{{ route('rates.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('rates.edit', $rate->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('rates.destroy', $rate->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
