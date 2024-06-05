@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Ingreso</h1>
    <form action="{{ route('incomes.update', $income->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="intermediary_id">Intermediario</label>
            <select class="form-control" id="intermediary_id" name="intermediary_id">
                <option value="">Ninguno</option>
                @foreach($intermediaries as $intermediary)
                    <option value="{{ $intermediary->id }}" {{ $income->intermediary_id == $intermediary->id ? 'selected' : '' }}>{{ $intermediary->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="apartment_id">Apartamento</label>
            <select class="form-control" id="apartment_id" name="apartment_id" required>
                @foreach($apartments as $apartment)
                    <option value="{{ $apartment->id }}" {{ $income->apartment_id == $apartment->id ? 'selected' : '' }}>{{ $apartment->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="rate_id">Tarifa</label>
            <select class="form-control" id="rate_id" name="rate_id" required>
                @foreach($rates as $rate)
                    <option value="{{ $rate->id }}" {{ $income->rate_id == $rate->id ? 'selected' : '' }}>{{ $rate->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="check_in">Fecha de Entrada</label>
            <input type="date" class="form-control" id="check_in" name="check_in" value="{{ $income->check_in->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="check_out">Fecha de Salida</label>
            <input type="date" class="form-control" id="check_out" name="check_out" value="{{ $income->check_out->format('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label for="client_name">Nombre del Cliente</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $income->client_name }}" required>
        </div>
        <div class="form-group">
            <label for="client_nif">NIF del Cliente</label>
            <input type="text" class="form-control" id="client_nif" name="client_nif" value="{{ $income->client_nif }}" required>
        </div>
        <div class="form-group">
            <label for="client_phone">Teléfono del Cliente</label>
            <input type="text" class="form-control" id="client_phone" name="client_phone" value="{{ $income->client_phone }}" required>
        </div>
        <div class="form-group">
            <label for="number_of_people">Número de Personas</label>
            <input type="number" class="form-control" id="number_of_people" name="number_of_people" value="{{ $income->number_of_people }}" required>
        </div>
        <div class="form-group">
            <label for="discount">Descuento (%)</label>
            <input type="number" class="form-control" id="discount" name="discount" step="0.01" value="{{ $income->discount }}" required>
        </div>
        <div class="form-group">
            <label for="observations">Observaciones</label>
            <textarea class="form-control" id="observations" name="observations">{{ $income->observations }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function loadRates(apartment_id, selected_rate_id = null) {
            $.ajax({
                url: '/get-rates/' + apartment_id,
                type: 'GET',
                success: function(data) {
                    $('#rate_id').empty();
                    if (data.length > 0) {
                        data.forEach(function(rate) {
                            var selected = selected_rate_id == rate.id ? 'selected' : '';
                            $('#rate_id').append('<option value="' + rate.id + '" ' + selected + '>' + rate.name + '</option>');
                        });
                    } else {
                        $('#rate_id').append('<option value="">No hay tarifas disponibles</option>');
                    }
                }
            });
        }

        $('#apartment_id').change(function() {
            var apartment_id = $(this).val();
            loadRates(apartment_id);
        });

        // Load rates for the selected apartment on page load
        loadRates($('#apartment_id').val(), {{ $income->rate_id }});
    });
</script>
@endsection