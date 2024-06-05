<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Alquileres</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Gestión de Alquileres</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('intermediaries.index') }}">Intermediarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('apartments.index') }}">Apartamentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rates.index') }}">Tarifas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('incomes.index') }}">Ingresos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('expenses.index') }}">Gastos</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-3">
        @yield('content')
    </div>
</body>
</html>
