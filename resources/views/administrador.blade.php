<!DOCTYPE html>
<html>
<head>
    <title>Administrador - Finanzas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico">
</head>
<body>
    <div class="container mt-5">
        <h2>Finanzas</h2>

        <div>
            <h2>Asociar vehículo existente</h2>
            @if(session('success'))
                <div style="color: rgb(9, 18, 9);">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach($errors->all() as $error)
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
                <input type="number" name="tipo_vehiculo" id="tipo_vehiculo" value="{{ request('tipo_vehiculo') }}">
            </div>
            <div>
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" value="{{ request('fecha') }}">
            </div>
            <div>
                <label for="tipo_pago">Tipo de Pago:</label>
                <input type="number" name="tipo_pago" id="tipo_pago" value="{{ request('tipo_pago') }}">
            </div>
            <button type="submit">Buscar</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Peaje</th>
                    <th>Saldo</th>
                    <th>Fecha</th>
                    <th>Tipo de Vehículo</th>
                    <th>Tipo de Pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach($finanzas as $finanza)
                    <tr>
                        <td>{{ $finanza->id_peaje }}</td>
                        <td>{{ $finanza->saldo }}</td>
                        <td>{{ $finanza->fecha }}</td>
                        <td>{{ $finanza->tipo_Vehiculo }}</td>
                        <td>{{ $finanza->tipo_pago }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>

        </div>
    </div>
</body>
</html>
