@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Tarifa</h1>
    <form action="{{ route('rates.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price_per_night">€/noche</label>
            <input type="number" class="form-control" id="price_per_night" name="price_per_night" required>
        </div>
        <div class="form-group">
            <label for="iva">IVA (%)</label>
            <input type="number" class="form-control" id="iva" name="iva" step="0.01">
        </div>
        <div class="form-group">
            <label for="apartment_id">Apartamento</label>
            <select class="form-control" id="apartment_id" name="apartment_id" required>
                @foreach($apartments as $apartment)
                    <option value="{{ $apartment->id }}">{{ $apartment->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
