<!DOCTYPE html>
<html>
<head>
    <title>Administrador - Finanzas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
        <!-- Tabla de Finanzas -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Peaje</th>
                    <th>Saldo</th>
                    <th>ID Empleado</th>
                    <th>Fecha</th>
                    <th>Tipo de Vehículo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($finanzas as $finanza)
                    <tr>
                        <td>{{ $finanza->id }}</td>
                        <td>{{ $finanza->id_peaje }}</td>
                        <td>{{ $finanza->saldo }}</td>
                        <td>{{ $finanza->id_empleado }}</td>
                        <td>{{ $finanza->fecha }}</td>
                        <td>{{ $finanza->tipo_vehiculo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Ganancias por Semana</h2>

        <!-- Tabla de Ganancias por Semana -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Semana</th>
                    <th>Ganancia Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gananciasPorSemana as $semana => $ganancia)
                    <tr>
                        <td>{{ $semana }}</td>
                        <td>{{ $ganancia }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div>

        </div>
    </div>
</body>
</html>
