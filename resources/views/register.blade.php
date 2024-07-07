<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Registro Cliente</title>
</head>

<body>
    <div class="formulario">
        <h1>Registro Telepass</h1>
        <form action="{{ route('register.guardar') }}" method="POST">
            @csrf
            <div class="username">
                <div class="username">

                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}">
                    <label for="nombre">Nombre:</label>
                </div>
                <div class="username">

                    <input type="text" id="nombre" name="cedula" value="{{ old('cedula') }}">
                    <label for="cedula">Cédula:</label>
                </div>
                <div class="username">

                    <input type="text" id="nombre" name="contrasenia" value="{{ old('contrasenia') }}">
                    <label for="contrasenia">Contraseña:</label>
                </div>
                <div class="username">

                    <input type="email" id="nombre" name="correo" value="{{ old('correo') }}">
                    <label for="correo">Correo:</label>
                </div>
                <div class="username">

                    <input type="text" id="nombre" name="telefono" value="{{ old('telefono') }}">
                    <label for="telefono">Teléfono:</label>
                </div>
                <button type="submit">Guardar Datos</button>

                @if (session('success'))
                    <div>{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        </form>
    </div>
</body>

</html>
