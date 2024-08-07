<!DOCTYPE html>
<html>

<head>
    <title>Empleado</title>
    <link rel="stylesheet" href="{{ asset('css/empleado.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico">
</head>

<body>
    <div class="contenedor">
        <nav class="contenedor">
            <div class="profile">
                <h1>Perfil de Cobrador</h1>
                <p>Cédula: {{ $user->cedula }}</p>
            </div>
        </nav>

        <section class="contenedor estilo-fondo flex">

            <div class="mb-4 separador">
                @if (session('success'))
                    <div id="alert-success" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('error'))
                    <div id="alert-error" class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <h2>Registrar Cobro</h2>
                <form action="{{ route('finanzas.cobro') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipo_Vehiculo" value="1">
                    <input type="hidden" name="saldo">
                    <button type="submit">Categoria 1</button>
                </form>

                <form action="{{ route('finanzas.cobro') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipo_Vehiculo" value="2">
                    <input type="hidden" name="saldo">
                    <button type="submit">Categoria 2</button>
                </form>

                <form action="{{ route('finanzas.cobro') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipo_Vehiculo" value="3">
                    <input type="hidden" name="saldo">
                    <button type="submit">Categoria 3</button>
                </form>

                <form action="{{ route('finanzas.cobro') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipo_Vehiculo" value="4">
                    <input type="hidden" name="saldo">
                    <button type="submit">Categoria 4</button>
                </form>

                <form action="{{ route('finanzas.cobro') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipo_Vehiculo" value="5">
                    <input type="hidden" name="saldo">
                    <button type="submit">Categoria 5</button>
                </form>

                <form action="{{ route('finanzas.cobro') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipo_Vehiculo" value="6">
                    <input type="hidden" name="saldo">
                    <button type="submit">Categoria 6</button>
                </form>

                <form action="{{ route('finanzas.cobro') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipo_Vehiculo" value="7">
                    <input type="hidden" name="saldo">
                    <button type="submit">Motos</button>
                </form>

                <form action="{{ route('finanzas.cobro') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tipo_Vehiculo" value="8">
                    <input type="hidden" name="saldo">
                    <button type="submit">Remolque</button>
                </form>

            </div>

            <div class="separador">
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
                <form class="info-link" action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Cerrar Sesión</button>
                </form>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const alertSuccess = document.getElementById("alert-success");
                    const alertSuccessRecarga = document.getElementById("alert-success-recarga");

                    if (alertSuccess) {
                        alert(alertSuccess.textContent.trim());
                    }

                    if (alertSuccessRecarga) {
                        alert(alertSuccessRecarga.textContent.trim());
                    }
                });
            </script>
        </section>

    </div>
</body>

</html>
