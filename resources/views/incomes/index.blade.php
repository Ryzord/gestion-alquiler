@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Ingresos</h1>
    <a href="{{ route('incomes.create') }}" class="btn btn-primary mb-3">Crear Ingreso</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Intermediario</th>
                <th>Apartamento</th>
                <th>Tarifa</th>
                <th>Fecha de Entrada</th>
                <th>Fecha de Salida</th>
                <th>Nº Personas</th>
                <th>Dto (%)</th>
                <th>Total Bruto</th>
                <th>Total IVA</th>
                <th>Total Factura</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $income)
                <tr>
                    <td>{{ $income->id }}</td>
                    <td>{{ $income->client_name }}</td>
                    <td>{{ $income->intermediary ? $income->intermediary->name : 'Factura Propia' }}</td>
                    <td>{{ $income->apartment->name }}</td>
                    <td>{{ $income->rate->name }} ( {{ $income->rate->price_per_night }}€ )</td>
                    <td>{{ $income->check_in->format('d-m-Y') }}</td>
                    <td>{{ $income->check_out->format('d-m-Y') }}</td>
                    <td>{{ $income->number_of_people }}</td>
                    <td>{{ $income->discount }}</td>
                    <td>{{ $income->total_invoice - $income->total_iva }}</td>
                    <td>{{ $income->total_iva }}</td>
                    <td>{{ $income->total_invoice }}</td>
                    <td>
                        <a href="{{ route('incomes.show', $income->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('incomes.edit', $income->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
