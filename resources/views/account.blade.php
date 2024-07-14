<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">        
    <title>Consultar Cuenta</title>
</head>
<body>
    <header class="content header">
        <div class="Explicacion">
            <p id="explicacion">
                Acceda de forma rápida y sencilla a toda la información relevante sobre su cuenta Telepass con 
                nuestra herramienta de consulta en línea. Con Telepass, gestionar sus pagos de peajes y servicios 
                asociados nunca ha sido tan fácil. Desde el estado de su saldo hasta el historial de transacciones, 
                nuestra plataforma le brinda la tranquilidad de tener todo bajo control. Descubra cómo simplificar 
                su experiencia de peaje con nuestra introducción a la consulta de cuenta Telepass.
            </p>
        </div>
    </header>

    <div class="formulario">
        <h1>Inicio de Sesion</h1>
        <form method="post">
            <div class="username">
                <input type="text" required>
                <label>Cedula o RUC</label>
            </div>
            <div class="username">
                <input type="password" required>
                <label>Contraseña</label>
            </div>
            <input type="submit" value="Iniciar">
        </form>
    </div>

</body>
</html>