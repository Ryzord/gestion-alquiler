@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Ingreso</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Cliente: {{ $income->client_name }}</h5>
            <p class="card-text"><strong>Intermediario:</strong> {{ $income->intermediary ? $income->intermediary->name : 'Factura Propia' }}</p>
            <p class="card-text"><strong>Apartamento:</strong> {{ $income->apartment->name }}</p>
            <p class="card-text"><strong>Tarifa:</strong> {{ $income->rate->name }} ( {{ $income->rate->price_per_night }} )</p>
            <p class="card-text"><strong>Fecha de Entrada:</strong> {{ $income->check_in->format('d-m-Y') }}</p>
            <p class="card-text"><strong>Fecha de Salida:</strong> {{ $income->check_out->format('d-m-Y') }}</p>
            <p class="card-text"><strong>Número de Noches:</strong> {{ $income->check_in->diffInDays($income->check_out) }}</p>
            <p class="card-text"><strong>Número de Personas:</strong> {{ $income->number_of_people }}</p>
            <p class="card-text"><strong>Descuento:</strong> {{ $income->discount }}%</p>
            <p class="card-text"><strong>Total IVA:</strong> {{ $income->total_iva }}</p>
            <p class="card-text"><strong>Total Factura:</strong> {{ $income->total_invoice }}</p>
            <p class="card-text"><strong>Observaciones:</strong> {{ $income->observations }}</p>
        </div>
    </div>
    <a href="{{ route('incomes.index') }}" class="btn btn-primary mt-3">Volver a la lista</a>
</div>
@endsection
