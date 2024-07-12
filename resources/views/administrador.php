<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administración</title>
</head>
<body>
    <h1>Panel de Administración</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <h2>Tabla de Finanzas</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Peaje</th>
                <th>Saldo</th>
                <th>ID Empleado</th>
                <th>Fecha</th>
                <th>Tipo Vehículo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($finanzas as $finanza)
                <tr>
                    <td>{{ $finanza->id_finanzas }}</td>
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
    <table border="1">
        <thead>
            <tr>
                <th>Semana</th>
                <th>Ganancia Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gananciasPorSemana as $semana => $ganancia)
                <tr>
                    <td>{{ $semana }}</td>
                    <td>{{ $ganancia }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
