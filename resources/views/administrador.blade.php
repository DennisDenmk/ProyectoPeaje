<!DOCTYPE html>
<html>
<head>
    <title>Administrador - Finanzas</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico">
</head>

<body>
    <div class="container mt-5">
        <header>
            <h2>Administrador</h2>
            <nav>
                <form class="info-link" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Cerrar Sesión</button>
                </form>
            </nav>
        </header>
        <div>
            <h2>Asociar vehículo existente</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('vehiculos.asociar') }}" method="POST">
                @csrf
                <div>
                    <label for="cedula">Cédula del Cliente:</label>
                    <input type="text" name="cedula" id="cedula" required>
                </div>
                <div>
                    <label for="placa">Placa:</label>
                    <input type="text" name="placa" id="placa" required>
                </div>
                <button type="submit">Asociar Vehículo</button>
            </form>
        </div>
        <form method="GET" action="{{ route('administrador') }}">
            <div>
                <label for="tipo_vehiculo">Tipo de Vehículo:</label>
                <select name="tipo_vehiculo" id="tipo_vehiculo">
                    <option value="1" {{ request('tipo_vehiculo') == 1 ? 'selected' : '' }}>Categoria 1</option>
                    <option value="2" {{ request('tipo_vehiculo') == 2 ? 'selected' : '' }}>Categoria 2</option>
                    <option value="3" {{ request('tipo_vehiculo') == 3 ? 'selected' : '' }}>Categoria 3</option>
                    <option value="4" {{ request('tipo_vehiculo') == 4 ? 'selected' : '' }}>Categoria 4</option>
                    <option value="5" {{ request('tipo_vehiculo') == 5 ? 'selected' : '' }}>Categoria 5</option>
                    <option value="6" {{ request('tipo_vehiculo') == 6 ? 'selected' : '' }}>Categoria 6</option>
                    <option value="7" {{ request('tipo_vehiculo') == 7 ? 'selected' : '' }}>MOTO</option>
                    <option value="8" {{ request('tipo_vehiculo') == 8 ? 'selected' : '' }}>REMOLQUE</option>
                </select>
            </div>
            <div>
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" value="{{ request('fecha') }}">
            </div>
            <div>
                <label for="tipo_pago">Tipo de Pago:</label>
                <select name="tipo_pago" id="tipo_pago">
                    <option value="1" {{ request('tipo_pago') == 1 ? 'selected' : '' }}>Efectivo</option>
                    <option value="2" {{ request('tipo_pago') == 2 ? 'selected' : '' }}>Telepass</option>
                </select>
            </div>
            <button type="submit">Buscar</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ubicación del Peaje</th>
                    <th>Saldo</th>
                    <th>Fecha</th>
                    <th>Tipo de Vehículo</th>
                    <th>Tipo de Pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finanzas as $finanza)
                    <tr>
                        <td>{{ $finanza->peaje->ubicacion ?? 'N/A' }}</td>
                        <td>{{ $finanza->saldo }}</td>
                        <td>{{ $finanza->fecha }}</td>
                        <td>{{ $categoriasVehiculos[$finanza->tipo_Vehiculo] ?? 'Desconocido' }}</td>
                        <td>{{ $tiposPago[$finanza->tipo_pago] ?? 'Desconocido' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>

        </div>
    </div>
</body>

</html>
