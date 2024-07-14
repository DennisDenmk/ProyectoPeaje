<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico">
    <title>Sistema de Peaje</title>
</head>

<body>
    <div class="head">
        <div class="logo">
            <img src="{{asset('img/logo.png')}}" alt="Panavial" height="90px">
        </div>
        <nav class="navegar">
            <a href="{{ route('register.form') }}">Registrate</a>
            <a href="{{ route('login.form') }}">Iniciar Sesion</a>
            <a href="{{ route('login.form') }}">Consulta Cuenta</a>
        </nav>
    </div>
    <header class="content header">
        <h2 class="titulo">Sistema de Peaje</h2>
        <div class="Explicacion">
            <p id="explicacion">
                Optimice su experiencia de viaje con nuestro sistema automatizado de peaje, diseñado para agilizar
                el tránsito y reducir tiempos de espera. Utilizando tecnología avanzada de identificación y cobro
                electrónico, nuestro sistema permite a los vehículos pasar sin necesidad de detenerse, ofreciendo una
                solución rápida, segura y eficiente para conductores y administradores de carreteras. Ideal para
                autopistas,
                puentes y túneles, nuestro sistema garantiza una gestión precisa y confiable de los peajes, mejorando la
                fluidez
                del tráfico y proporcionando comodidad a los usuarios. Únase a la revolución del peaje inteligente y
                disfrute de un viaje
                sin interrupciones.
            </p>
        </div>
    </header>

    <section class="content sau">

        <div class="box-container">

            <div class="box">
                <i class="fab fa-servicio"></i>
                <h3>Tipo de Servicios</h3>
                <img src="{{asset('img/46001.png')}}" alt="#" width="100px" height="100px">
                <br>
                <a href="http://localhost/example-app/public/Service" class="bnt"> Saber mas</a>
            </div>

            <div class="box">
                <i class="fab fa-registro"></i>
                <h3 >Informe Registro Registro TelePass</h3>
                <img src="{{asset('img/pnvl-icono-telepass-2.png')}}" alt="#" width="70px" height="70px">
                <br>

                <a href="http://localhost/example-app/public/telepass" class="bnt">
                    Saber mas</a>
            </div>

            <div class="box">
                <i class="fab fa-telepass"></i>
                <h3>Consulta Saldo Telepas</h3>
                <img src="{{asset('img/pngegg.png')}}" alt="#" width="100px" height="100px">
                <br>
                <a href="{{ route('login.form') }}" class="bnt">
                    Saber mas</a>
            </div>

        </div>
    </section>

    <section class="contenedor contact">
        <h2 class="title">Contactos</h2><br>

        <div class="foorter-section">

            <div>
                <p>Numero Telefeno: 0999123556</p>
                <br>
            </div>

            <div>
                <p>
                    Email: Telepass@gmail.com
                    <br>
                </p>
            </div>

        </div>
    </section>
</body>

</html>