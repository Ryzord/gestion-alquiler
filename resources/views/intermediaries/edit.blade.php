@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Intermediario</h1>
    <form action="{{ route('intermediaries.update', $intermediary->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $intermediary->name }}" required>
        </div>
        <div class="form-group">
            <label for="surname">Apellidos</label>
            <input type="text" name="surname" class="form-control" value="{{ $intermediary->surname }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $intermediary->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ $intermediary->phone }}" required>
        </div>
        <div class="form-group">
            <label for="commission">Comisión (%)</label>
            <input type="number" name="commission" class="form-control" value="{{ $intermediary->commission }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
    </form>
</div>
@endsection
