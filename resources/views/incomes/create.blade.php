@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Ingreso</h1>
    <form action="{{ route('incomes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="intermediary_id">Intermediario</label>
            <select class="form-control" id="intermediary_id" name="intermediary_id">
                <option value="">Factura Propia</option>
                @foreach($intermediaries as $intermediary)
                    <option value="{{ $intermediary->id }}">{{ $intermediary->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="apartment_id">Apartamento</label>
            <select class="form-control" id="apartment_id" name="apartment_id" required>
                <option value="" disabled selected>Selecciona un apartamento</option>
                @foreach($apartments as $apartment)
                    <option value="{{ $apartment->id }}">{{ $apartment->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="rate_id">Tarifa</label>
            <select class="form-control" id="rate_id" name="rate_id" required>
                <option value="">Selecciona un apartamento primero</option>
            </select>
        </div>
        <div class="form-group">
            <label for="check_in">Fecha de Entrada</label>
            <input type="date" class="form-control" id="check_in" name="check_in" required>
        </div>
        <div class="form-group">
            <label for="check_out">Fecha de Salida</label>
            <input type="date" class="form-control" id="check_out" name="check_out" required>
        </div>
        <div class="form-group">
            <label for="client_name">Nombre del Cliente</label>
            <input type="text" class="form-control" id="client_name" name="client_name" required>
        </div>
        <div class="form-group">
            <label for="client_nif">NIF del Cliente</label>
            <input type="text" class="form-control" id="client_nif" name="client_nif" required>
        </div>
        <div class="form-group">
            <label for="client_phone">Teléfono del Cliente</label>
            <input type="text" class="form-control" id="client_phone" name="client_phone" required>
        </div>
        <div class="form-group">
            <label for="number_of_people">Número de Personas</label>
            <input type="number" class="form-control" id="number_of_people" name="number_of_people" required>
        </div>
        <div class="form-group">
            <label for="discount">Descuento (%)</label>
            <input type="number" class="form-control" id="discount" name="discount" step="0.01" value="0" required>
        </div>
        <div class="form-group">
            <label for="observations">Observaciones</label>
            <textarea class="form-control" id="observations" name="observations"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#apartment_id').change(function() {
            var apartment_id = $(this).val();
            $.ajax({
                url: '/get-rates/' + apartment_id,
                type: 'GET',
                success: function(data) {
                    $('#rate_id').empty();
                    if (data.length > 0) {
                        data.forEach(function(rate) {
                            $('#rate_id').append('<option value="' + rate.id + '">' + rate.name + ' ( ' + rate.price_per_night + ' €/noche )</option>');
                        });
                    } else {
                        $('#rate_id').append('<option value="">No hay tarifas disponibles</option>');
                    }
                }
            });
        });
    });
</script>
@endsection
