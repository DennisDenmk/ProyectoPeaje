<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/home.css')}}"> 
    <link rel="icon" href="favicon.ico" type="ico">
    <title>Sistema de Peaje</title>
    <!-- Incluye la biblioteca de FontAwesome para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header class="main-header">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="logo">
        </div>
        <nav class="navegar">
            <a href="{{ route('register.form') }}">Registrate</a>
            <a href="{{ route('login.form') }}">Iniciar Sesion</a>
            <a href="{{ route('login.form') }}">Consulta Cuenta</a>
        </nav>
    </header>
    <main>
        <section class="content header">
            <h2 class="titulo">Sistema de Peaje</h2>
            <div class="Explicacion">
                <p id="explicacion">
                    Mejore su experiencia de viaje con nuestro sistema automatizado de peaje,
                    diseñado para hacer más fluido el tránsito y minimizar los tiempos de espera.
                    Gracias a la tecnología avanzada de identificación y cobro electrónico,
                    nuestros dispositivos permiten a los vehículos pasar sin detenerse, ofreciendo una solución rápida,
                    segura y eficiente tanto para conductores como para administradores de carreteras.
                    del tráfico y proporcionando comodidad a los usuarios. Únase a la revolución del peaje inteligente y
                    disfrute
                    de un viaje sin interrupciones.
                </p>
            </div>
        </section>
        <section class="content sau">
            <div class="box-container">
                <div class="box">
                    <i class="fa fa-cogs"></i>
                    <h3>Tipo de Servicios</h3>
                    <img src="{{ asset('img/remolque.png') }}" alt="#" width="100px" height="100px">
                    <br>
                    <a href="{{ route('service') }}" class="btn"> Saber mas</a>
                </div>
                <div class="box">
                    <h3>Informacion sobre registro</h3>
                    <img src="{{ asset('img/pnvl-icono-telepass-2.png') }}" alt="#" width="70px" height="70px">
                    <br>
                    <a href="{{ route('telepass') }}" class="btn"> Saber mas</a>
                </div>
                <div class="box">
                    <i class="fa fa-dollar"></i>
                    <h3>Consulta Saldo Telepas</h3>
                    <img src="{{ asset('img/signo-dolar.png') }}" alt="#" width="100px" height="100px">
                    <br>
                    <a href="{{ route('login.form') }}" class="btn"> Saber mas</a>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-section contact">
            <h2>Contacto</h2>
            <ul>
                <li>Teléfono: 0987242851</li>
                <li>Email: info@peajesistema.com</li>
            </ul>
        </div>
        <div class="socials">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>
        <div class="footer-bottom">
            &copy; 2024 Sistema de Peaje. Todos los derechos reservados.
        </div>
    </footer>
</body>

</html>
