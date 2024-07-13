<!-- resources/views/menu.blade.php -->
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
        <form class="info-link" action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Cerrar Sesión</button>
        </form>
    </div>

    <div class="description" id="userDescription">
        <h1>Perfil de Usuario</h1>
        <p>Nombre: {{ $user->nombre }}</p>
    </div>

    <div class="description" id="configDescription">
        <p>Opción 1: Cambiar contraseña</p>
        <p>Opción 2: Actualizar email</p>
        <p>Opción 3: Configuración de privacidad</p>
    </div>
    <div class="description" id="vehiclesDescription">
        <div class="vehicles-menu">
            <div class="left">
                <p>Detalles</p>
                <p>Eliminar</p>
            </div>
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

        <!-- Formulario de registro de vehículos -->
        <div class="vehicle-registration">
            <h2>Registrar nuevo vehículo</h2>
            @if(session('success'))
                <div style="color: rgb(9, 18, 9);">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('vehiculo.add') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="placa">Placa del Vehículo:</label>
                    <input type="text" name="placa" id="placa" class="form-control" required maxlength="7">
                </div>
                <button type="submit" class="btn btn-primary">Añadir Vehículo</button>
            </form>
        </div>
    </div>
    <div class="description" id="configDescription" style="display:none;">
        <p>Opción 1: Cambiar contraseña</p>
        <p>Opción 2: Actualizar email</p>
        <p>Opción 3: Configuración de privacidad</p>
    </div>
    <script src="{{ asset('js/menu.js') }}"></script>
</body>

</html>
