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
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
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
        <div class="vehicle-association">
            <h2>Asociar vehículo existente</h2>
            @if(session('success'))
                <div style="color: green;">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('vehiculos.asociar') }}" method="POST">
                @csrf
                <label for="placa">Placa del Vehículo:</label>
                <input type="text" id="placa" name="placa" required><br>

                <button type="submit">Asociar Vehículo</button>
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
