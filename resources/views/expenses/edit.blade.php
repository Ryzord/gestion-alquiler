@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Gasto</h1>
    <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="apartment_id">Apartamento</label>
            <select class="form-control" id="apartment_id" name="apartment_id" required>
                @foreach($apartments as $apartment)
                    <option value="{{ $apartment->id }}" {{ $expense->apartment_id == $apartment->id ? 'selected' : '' }}>{{ $apartment->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="concept">Concepto</label>
            <input type="text" class="form-control" id="concept" name="concept" value="{{ $expense->concept }}" required>
        </div>
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $expense->date }}" required>
        </div>
        <div class="form-group">
            <label for="provider_nif">NIF Proveedor</label>
            <input type="text" class="form-control" id="provider_nif" name="provider_nif" value="{{ $expense->provider_nif }}">
        </div>
        <div class="form-group">
            <label for="expense">Gasto Bruto</label>
            <input type="number" class="form-control" id="expense" name="expense" value="{{ $expense->expense }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="iva">IVA (%)</label>
            <input type="number" class="form-control" id="iva" name="iva" value="{{ $expense->iva }}" step="0.01">
        </div>
        <div class="form-group">
            <label for="paid">Pagado</label>
            <select class="form-control" id="paid" name="paid" required>
                <option value="1" {{ $expense->paid ? 'selected' : '' }}>Si</option>
                <option value="0" {{ !$expense->paid ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
