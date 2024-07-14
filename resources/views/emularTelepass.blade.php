<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/empleado.css')}}">
    <title>EmularTelepass</title>
</head>
<body>
    <main>
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
    </main>
</body>
</html>
