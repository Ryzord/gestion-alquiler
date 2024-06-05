@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Gasto</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tipo de Gasto: {{ $expense->expense_type }}</h5>
            <p class="card-text"><strong>Concepto:</strong> {{ $expense->concept }}</p>
            <p class="card-text"><strong>Fecha:</strong> {{ $expense->date }}</p>
            <p class="card-text"><strong>NIF del Proveedor:</strong> {{ $expense->provider_nif ?? 'N/A' }}</p>
            <p class="card-text"><strong>Gasto Bruto:</strong> {{ $expense->expense }} €</p>
            <p class="card-text"><strong>IVA:</strong> {{ $expense->iva ?? '0' }} %</p>
            <p class="card-text"><strong>Total IVA:</strong> {{ $expense->total_iva }} €</p>
            <p class="card-text"><strong>Total Gasto:</strong> {{ $expense->total_invoice }} €</p>
            <p class="card-text"><strong>Pagado:</strong> {{ $expense->paid ? 'Sí' : 'No' }}</p>
            <a href="{{ route('expenses.index') }}" class="btn btn-primary">Volver</a>
            <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-secondary">Editar</a>
            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('¿Está seguro de que desea eliminar este gasto?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
