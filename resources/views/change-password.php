<!DOCTYPE html>
<html>
<head>
    <title>Cambiar Contraseña</title>
</head>
<body>
    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('change-password') }}" method="POST">
        @csrf
        <div>
            <label for="current_password">Contraseña Actual</label>
            <input type="password" id="current_password" name="current_password" required>
        </div>
        <div>
            <label for="new_password">Nueva Contraseña</label>
            <input type="password" id="new_password" name="new_password" required>
        </div>
        <div>
            <label for="new_password_confirmation">Confirmar Nueva Contraseña</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
        </div>
        <div>
            <button type="submit">Cambiar Contraseña</button>
        </div>
    </form>
</body>
</html>