<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/empleado.css')}}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico">
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
                <div class="form-group">
                    <label for="id_peaje">ID del Peaje:</label>
                    <input type="number" name="id_peaje" id="id_peaje" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="placa">Placa del Vehículo:</label>
                    <input type="text" name="placa" id="placa" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Realizar Cobro</button>
            </form>
        </div>
    </main>
</body>
</html>
