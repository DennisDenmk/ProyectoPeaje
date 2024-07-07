<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login Cajero</title>
</head>

<body>
    <div class="formulario">
        <h1>Inicio de Sesion</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
        
            <div>
                <label for="cedula">Cédula</label>
                <input id="cedula" type="text" name="cedula" value="{{ old('cedula') }}" required autofocus>
            </div>
        
            <div>
                <label for="contrasenia">Contraseña</label>
                <input id="contrasenia" type="password" name="contrasenia" required>
            </div>
            <div>
                <input type="checkbox" id="tipo_empleado" name="tipo_usuario[]" value="empleado">
                <label for="tipo_empleado">Empleado</label>
            </div>
            <div>
                <input type="checkbox" id="tipo_cliente" name="tipo_usuario[]" value="cliente">
                <label for="tipo_cliente">Cliente</label>
            </div>
        
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
