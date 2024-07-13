<!DOCTYPE html>
<html>

<head>
    <title>Empleado</title>
    <link rel="stylesheet" href="{{ asset('css/empleado.css') }}">
</head>

<body>
    <div class="contenedor">
        <div class="profile">
            <h1>Perfil de Cobrador</h1>
            <p>Cédula: {{ $user->cedula }}</p>
        </div>


        <div class="mb-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h2>Registrar Cobro</h2>
            <form action="{{ route('finanzas.cobro') }}" method="POST">
                @csrf
                <input type="hidden" name="tipo_vehiculo" value="1">
                <input type="hidden" name="saldo" value="1.00">
                <button type="submit">Categoria 1</button>
            </form>

            <form action="{{ route('finanzas.cobro') }}" method="POST">
                @csrf
                <input type="hidden" name="tipo_vehiculo" value="2">
                <input type="hidden" name="saldo" value="2.00">
                <button type="submit">Categoria 2</button>
            </form>

            <form action="{{ route('finanzas.cobro') }}" method="POST">
                @csrf
                <input type="hidden" name="tipo_vehiculo" value="3">
                <input type="hidden" name="saldo" value="3.00">
                <button type="submit">Categoria 3</button>
            </form>

            <form action="{{ route('finanzas.cobro') }}" method="POST">
                @csrf
                <input type="hidden" name="tipo_vehiculo" value="4">
                <input type="hidden" name="saldo" value="4.00">
                <button type="submit">Categoria 4</button>
            </form>

            <form action="{{ route('finanzas.cobro') }}" method="POST">
                @csrf
                <input type="hidden" name="tipo_vehiculo" value="5">
                <input type="hidden" name="saldo" value="5.00">
                <button type="submit">Categoria 5</button>
            </form>

            <form action="{{ route('finanzas.cobro') }}" method="POST">
                @csrf
                <input type="hidden" name="tipo_vehiculo" value="6">
                <input type="hidden" name="saldo" value="6.00">
                <button type="submit">Categoria 6</button>
            </form>

            <form action="{{ route('finanzas.cobro') }}" method="POST">
                @csrf
                <input type="hidden" name="tipo_vehiculo" value="7">
                <input type="hidden" name="saldo" value="6.00">
                <button type="submit">Motos</button>
            </form>

            <form action="{{ route('finanzas.cobro') }}" method="POST">
                @csrf
                <input type="hidden" name="tipo_vehiculo" value="8">
                <input type="hidden" name="saldo" value="6.00">
                <button type="submit">Remolque</button>
            </form>
            

            </form>

        </div>
    </div>
    <div>
        <h2>Recargar Saldo a Clientes</h2>
        <form action="{{ route('clientes.recargar') }}" method="POST">
            @csrf
            <div>
                <label for="placa">Placa del Vehículo:</label>
                <input type="text" name="placa" id="placa" required maxlength="7">
            </div>
            <div>
                <label for="monto">Monto a Recargar:</label>
                <input type="number" name="monto" id="monto" required step="0.01">
            </div>
            <button type="submit">Recargar Saldo</button>
        </form>
    </div>
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <form class="info-link" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Cerrar Sesión</button>
    </form>
    </div>

    </div>
</body>

</html>
