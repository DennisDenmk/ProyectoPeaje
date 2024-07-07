<!DOCTYPE html>
<html>
<head>
    <title>Empleado</title>
</head>
<body>
    <div class="profile">
        <h1>Perfil de Usuario</h1>
        <p>Cédula: {{ $user->cedula }}</p>
        <p>Correo: {{ $user->correo }}</p>
        <p>Rol: {{ $user->rol }}</p>
    </div>

    <h2>Ingresar Placa de Vehículo</h2>
    <!--
    <form method="POST" action="{{ route('guardar-placa') }}">
        @csrf

        <label for="placa">Placa:</label>
        <input type="text" id="placa" name="placa" required>

        <button type="submit">Guardar</button>
    </form>
    -->
</body>
</html>