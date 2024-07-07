<!DOCTYPE html>
<html>
<head>
    <title>Crear Ticket</title>
    <link rel="stylesheet" href="{{asset('css/ticket.css')}}">
</head>
<body>
    <h1>Crear Ticket</h1>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tickets.store') }}" method="POST" class="formulario">
        @csrf
        <label for="nombre">Nombre:</label class="username">
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required><br>

        <label for="hora">Hora:</label>
        <input type="date" name="hora" id="hora" value="{{ old('hora') }}" required><br>

        <label for="placa">Placa:</label>
        <input type="text" name="placa" id="placa" value="{{ old('placa') }}" required><br>

        <label for="costo">Costo:</label>
        <input type="number" step="1" name="costo" id="costo" value="{{ old('costo') }}"><br>

        <label for="ubicacion">Ubicacion:</label>
        <input type="text" name="ubicacion" id="ubicacion" value="{{ old('ubicacion') }}"><br>

        <button type="submit">Crear Ticket</button>
    </form>
</body>
</html>