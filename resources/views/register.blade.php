<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="{{ asset('css/register.css') }}">-->
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
    <div class="formulario">
        <h2>Registro empleado</h2>
        <form method="POST" action="{{ route('registro.empleado') }}">
            @csrf

            <div class="form-group">
                <label for="cedula">Cédula</label>
                <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>

                @error('cedula')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="contrasenia">Contraseña</label>
                <input id="contrasenia" type="password" class="form-control @error('contrasenia') is-invalid @enderror" name="contrasenia" required autocomplete="new-password">

                @error('contrasenia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <input id="rol" type="text" class="form-control @error('rol') is-invalid @enderror" name="rol" value="{{ old('rol') }}" required autocomplete="rol">

                @error('rol')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input id="correo" type="email" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}" required autocomplete="correo">

                @error('correo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="sueldo">Sueldo</label>
                <input id="sueldo" type="number" step="any" class="form-control @error('sueldo') is-invalid @enderror" name="sueldo" value="{{ old('sueldo') }}" required>

                @error('sueldo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Registrar Empleado</button>
        </form>
    </div>
</body>

</html>
