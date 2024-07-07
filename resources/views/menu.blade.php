<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <title>Menu</title>
</head>

<body>
    <div class="navbar">
        <a href="javascript:void(0)" class="info-link" data-target="userDescription">INFO USUARIO</a>
        <a href="javascript:void(0)" class="info-link" data-target="vehiclesDescription">VEHICULOS REGISTRADOS</a>
        <a href="javascript:void(0)" class="info-link" data-target="configDescription">CONFIGURACION CUENTA</a>
    </div>
    <div class="profile">
        <h1>Perfil de Usuario</h1>
        <p>Nombre: {{ $user->nombre }}</p>
        <p>Cédula: {{ $user->cedula }}</p>
        <p>Correo: {{ $user->correo }}</p>
        <p>Teléfono: {{ $user->telefono }}</p>
    </div>
    <div class="description" id="vehiclesDescription">
        <div class="vehicles-menu">
            <div class="left">
                <p>Detalles</p>
                <p>Eliminar</p>

            </div>
            <div class="right">
                <p>Vehiculos al nombre del usuario </p>
                @if ($vehiculos->count() > 0)
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
    <div class="description" id="configDescription">
        <p>Opción 1: Cambiar contraseña</p>
        <p>Opción 2: Actualizar email</p>
        <p>Opción 3: Configuración de privacidad</p>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
    <script src="{{ asset('js/menu.js') }}"></script>
</body>

</html>
