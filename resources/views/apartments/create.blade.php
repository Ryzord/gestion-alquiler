@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Añadir nuevo Apartamento</h1>
    <form action="{{ route('apartments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="city">Localidad</label>
            <input type="text" name="city" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="postal_code">Código Postal</label>
            <input type="text" name="postal_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="country">País</label>
            <input type="text" name="country" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
