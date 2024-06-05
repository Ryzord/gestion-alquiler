@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gastos</h1>
    <a href="{{ route('expenses.create') }}" class="btn btn-primary">Crear nuevo Gasto</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Apartamento</th>
                <th>Concepto</th>
                <th>Fecha</th>
                <th>NIF Proveedor</th>
                <th>Gasto Bruto</th>
                <th>IVA (%)</th>
                <th>IVA (€)</th>
                <th>Total Gasto</th>
                <th>Pagado</th>
                <th>...</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->apartment->name }}</td>
                <td>{{ $expense->concept }}</td>
                <td>{{ $expense->date }}</td>
                <td>{{ $expense->provider_nif }}</td>
                <td>{{ $expense->expense }}</td>
                <td>{{ $expense->iva }}</td>
                <td>{{ $expense->total_iva }}</td>
                <td>{{ $expense->total_invoice }}</td>
                <td>{{ $expense->paid ? 'Si' : 'No' }}</td>
                <td>
                    <a href="{{ route('expenses.show', $expense->id) }}" class="btn btn-info">Detalles</a>
                    <a href="{{ route('expenses.edit', $expense->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
