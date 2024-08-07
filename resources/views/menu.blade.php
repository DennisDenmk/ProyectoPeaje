<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/cliente.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico">
    <title>Menu</title>
</head>

<body class="center">
    <div class="navbar">
        <a href="javascript:void(0)" class="info-link" data-target="userDescription">INFO USUARIO</a>
        <a href="javascript:void(0)" class="info-link" data-target="vehiclesDescription">VEHICULOS REGISTRADOS</a>
        <a href="javascript:void(0)" class="info-link" data-target="configDescription">CONFIGURACION CUENTA</a>
        <form class="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Cerrar Sesión</button>
        </form>
    </div>

    <div class="description" id="userDescription">
        <h1>Perfil de Usuario</h1>
        <p>Nombre: {{ $user->nombre }}</p>
        <p>Cédula: {{ $user->cedula }}</p>
        <p>Correo: {{ $user->correo }}</p>
        <p>Teléfono: {{ $user->telefono }}</p>
    </div>

    <div class="description" id="vehiclesDescription" style="display:none;">
        <div class="vehicles-menu">

            <div class="right">
                <p>Vehículos al nombre del usuario </p>
                @if ($vehiculos && $vehiculos->count() > 0)
                    <h2>Vehículos:</h2>
                    <ul>
                        @foreach ($vehiculos as $vehiculo)
                            <li>
                                <strong>Placa:</strong> {{ $vehiculo->placa }} <br>
                                <strong>Tipo:</strong> {{ $vehiculo->tipo_vehiculo }} <br>
                                <strong>Año:</strong> {{ $vehiculo->anio }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No hay vehículos registrados.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="description" id="configDescription" style="display:none;">
        <p>Opción 1: Cambiar contraseña</p>
        <div>
            <form action="{{ route('updatePassword') }}" method="POST">
                @csrf
                <div>
                    <label for="current_password">Contraseña Actual:</label>
                    <input type="password" name="current_password" id="current_password" required>
                </div>
                <div>
                    <label for="new_password">Nueva Contraseña:</label>
                    <input type="password" name="new_password" id="new_password" required>
                </div>
                <div>
                    <label for="new_password_confirmation">Confirmar Nueva Contraseña:</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" required>
                </div>
                <button type="submit">Cambiar Contraseña</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/menu.js') }}"></script>
</body>

</html>
