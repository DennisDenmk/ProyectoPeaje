<!DOCTYPE html>
<html>

<head>
    <title>Empleado</title>
    <link rel="stylesheet" href="{{asset('css/empleado.css')}}">
</head>

<body>
    <div class="contenedor">
        <div class="profile">
            <h1>Perfil de Usuario</h1>
            <p>Cédula: {{ $user->cedula }}</p>
        </div>


        <div class="mb-4">
            <h2>Registrar Cobro</h2>
            <form action="{{ route('finanzas.cobro') }}" method="POST">
                @csrf
                <div class="btn-group" role="group">
                    <button type="submit" name="tipo_vehiculo" value="1" class="btn btn-primary">
                        Moto - $1.00
                    </button>
                    <button type="submit" name="tipo_vehiculo" value="2" class="btn btn-secondary">
                        Carro - $2.00
                    </button>
                    <button type="submit" name="tipo_vehiculo" value="3" class="btn btn-success">
                        Camioneta - $3.00
                    </button>
                    <button type="submit" name="tipo_vehiculo" value="4" class="btn btn-danger">
                        Bus - $4.00
                    </button>
                    <button type="submit" name="tipo_vehiculo" value="5" class="btn btn-warning">
                        Tractor - $5.00
                    </button>
                    <button type="submit" name="tipo_vehiculo" value="6" class="btn btn-info">
                        Trailer - $6.00
                    </button>
                </div>
                <input type="hidden" name="saldo" id="saldo">
            </form>
        </div>
    <!--COBRO DE VEHICULO-->
        <div class="description">
            <h2>Cobrar a Cliente</h2>
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
            <form action="{{ route('vehiculos.cobro') }}" method="POST">
                @csrf
                <label for="placa">Placa del Vehículo:</label>
                <input type="text" id="placa" name="placa" required><br>

                <button type="submit">Cobrar</button>
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

    </div>
</body>

</html>
