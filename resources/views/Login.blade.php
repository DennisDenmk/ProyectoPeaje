<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico">
    <title>Login Cajero</title>
</head>

<body>
    <div class="formulario">
        <h1>Inicio de Sesion</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf


            <div class="username">
                <div>
                    <input id="cedula" type="text" name="cedula" value="{{ old('cedula') }}" required autofocus>
                    <label for="cedula">Cédula</label>
                </div>
            </div>

            <div class="username">
                <div>
                    <input id="contrasenia" type="password" name="contrasenia" required>
                    <label for="contrasenia">Contraseña</label>
                </div>
            </div>

            <div>
                <label for="tipo_usuario">Tipo de Usuario</label>
                <select id="tipo_usuario" name="tipo_usuario" required>
                    <option value="cliente">Cliente</option>
                    <option value="empleado">Empleado</option>
                </select>
            </div>
            <br>


            @error('cedula')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>

</body>

</html>
