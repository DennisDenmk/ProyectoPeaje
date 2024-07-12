<!DOCTYPE html>
<html>

<head>
    <title>Empleado</title>
</head>

<body>

    <div class="profile">
        <h1>Perfil de Usuario</h1>
        <p>Cédula: {{ $user->cedula }}</p>
    </div>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <form action="{{ route('finanzas.cobro') }}" method="POST">
            @csrf
            <input type="hidden" name="tipo_vehiculo" value="1">
            <input type="hidden" name="saldo" value="1.00">
            <button type="submit">Moto - $1.00</button>
        </form>

        <form action="{{ route('finanzas.cobro') }}" method="POST">
            @csrf
            <input type="hidden" name="tipo_vehiculo" value="2">
            <input type="hidden" name="saldo" value="2.00">
            <button type="submit">Carro - $2.00</button>
        </form>

        <form action="{{ route('finanzas.cobro') }}" method="POST">
            @csrf
            <input type="hidden" name="tipo_vehiculo" value="3">
            <input type="hidden" name="saldo" value="3.00">
            <button type="submit">Camioneta - $3.00</button>
        </form>

        <form action="{{ route('finanzas.cobro') }}" method="POST">
            @csrf
            <input type="hidden" name="tipo_vehiculo" value="4">
            <input type="hidden" name="saldo" value="4.00">
            <button type="submit">Bus - $4.00</button>
        </form>

        <form action="{{ route('finanzas.cobro') }}" method="POST">
            @csrf
            <input type="hidden" name="tipo_vehiculo" value="5">
            <input type="hidden" name="saldo" value="5.00">
            <button type="submit">Tractor - $5.00</button>
        </form>

        <form action="{{ route('finanzas.cobro') }}" method="POST">
            @csrf
            <input type="hidden" name="tipo_vehiculo" value="6">
            <input type="hidden" name="saldo" value="6.00">
            <button type="submit">Trailer - $6.00</button>
        </form>
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
    
        <form class="info-link" action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Cerrar Sesión</button>
        </form>
    </div>
</body>

</html>
