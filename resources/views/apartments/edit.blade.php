@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Apartamento</h1>
    <form action="{{ route('apartments.update', $apartment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $apartment->name }}" required>
        </div>
        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control" value="{{ $apartment->address }}" required>
        </div>
        <div class="form-group">
            <label for="city">Localidad</label>
            <input type="text" name="city" class="form-control" value="{{ $apartment->city }}" required>
        </div>
        <div class="form-group">
            <label for="postal_code">Código Postal</label>
            <input type="text" name="postal_code" class="form-control" value="{{ $apartment->postal_code }}" required>
        </div>
        <div class="form-group">
            <label for="country">País</label>
            <input type="text" name="country" class="form-control" value="{{ $apartment->country }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
@endsection
