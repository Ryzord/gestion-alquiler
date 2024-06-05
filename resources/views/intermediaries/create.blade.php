@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Añadir nuevo Intermediario</h1>
    <form action="{{ route('intermediaries.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="surname">Apellidos</label>
            <input type="text" name="surname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="commission">Comisión (%)</label>
            <input type="number" name="commission" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
