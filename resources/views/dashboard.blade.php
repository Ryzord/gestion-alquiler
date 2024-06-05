@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <h3>Ingresos</h3>
                        <ul>
                            @foreach ($incomes as $income)
                                <li>{{ $income->client_name }} - {{ $income->total_invoice }}€</li>
                            @endforeach
                        </ul>
                        <p>Total de ingresos: {{ $totalIncomes }}€</p>

                        <hr>
                        <h3>Gastos</h3>
                        <ul>
                            @foreach ($expenses as $expense)
                                <li>{{ $expense->concept }} - {{ $expense->total_invoice }}€</li>
                            @endforeach
                        </ul>
                        <p>Total de gastos: {{ $totalExpenses }}€</p>

                        <hr>
                        <h3>Resultado</h3>
                        <p>Resultado: {{ $result }}€</p>

                        <hr>
                        <h3>Liquidación Trimestral de IVA</h3>
                        <form method="POST" action="{{ route('calculateQuarterlyVAT') }}">
                            @csrf
                            <div class="form-group">
                                <label for="quarter">Trimestre</label>
                                <select name="quarter" id="quarter" class="form-control">
                                    <option value="1">Primer Trimestre</option>
                                    <option value="2">Segundo Trimestre</option>
                                    <option value="3">Tercer Trimestre</option>
                                    <option value="4">Cuarto Trimestre</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Calcular</button>
                        </form>
                        <br>
                        <p>Balance IVA Trimestral ({{$currentQuarter}}): {{ $quarterlyVAT }}€</p>
                        <ul>
                            <li>IVA Ingresos: {{ $totalQuarterlyIncomes }}€</li>
                            <li>IVA Gastos: {{ $totalQuarterlyExpenses }}€</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
