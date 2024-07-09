<!DOCTYPE html>
<html>
<head>
    <title>Empleado</title>
</head>
<body>
    <!--
    <div class="profile">
        <h1>Perfil de Usuario</h1>
        <p>Cédula: {{ $user->cedula }}</p>
        <p>Correo: {{ $user->correo }}</p>
    </div>
    -->
    <form action="{{ route('finanzas.cobro') }}" method="POST">
        @csrf
        <div>
            <label for="saldo">Saldo:</label>
            <input type="number" name="saldo" id="saldo" required step="0.01">
        </div>
        <div>
            <label for="tipo_vehiculo">Tipo de Vehículo:</label>
            <input type="number" name="tipo_vehiculo" id="tipo_vehiculo" required>
        </div>
        <button type="submit">Añadir Finanza</button>
    </form>
</body>
</html>