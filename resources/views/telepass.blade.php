<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/telepass.css')}}">  
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico">      
    <title>Informe Telepass</title>
</head>

<body>
    <header class="head">
        <div class="logo">
            <h1>Informe Telepass</h1>
        </div>
        <nav class="navegar">
            <a href="http://localhost/example-app/public/home">Volver</a>
        </nav>
    </header>

    <main class="principal">
        <section class="img-peajes">
            <img id="ImgTel" src="{{asset('img\Telepass.jpeg')}}" alt="Telepass">
            <h2 class="titulo">Sistema de Peaje</h2>
        </section>


        <article class="explicacion">
            <p id="explicacion">
                Para mejorar la asistencia a los usuarios, se han establecido vías exclusivas para el servicio de
                TELEPASS en cada sentido de circulación en todas las estaciones de peaje disponibles para todo tipo de
                vehículos.

                Estas vías están claramente señalizadas con indicaciones horizontales y verticales de aproximación y una
                pantalla con el texto "EXCLUSIVO TELEPASS", además de estar delimitadas por conos en su ingreso.

                Las vías son automáticas y no cuentan con cajeros, por lo que solo pueden ser utilizadas por usuarios
                registrados en el servicio y con saldo en sus cuentas de prepago.

                El acceso a este servicio es sencillo y rápido a través de las oficinas de atención al cliente en cada
                estación de peaje o a través de nuestra pagina web.
            </p>
        </article>

        <section class="img-peajes">
            <img id="ImgTel" src="{{asset('img\Pasar.jpeg')}}" alt="Telepass">
        </section>

        <div class="requisito">
            <h1>Requisitos para adquirir el TELEPASS</h1>
        </div>
        <article class="explicacion quitar-margentop">
            <ul>
                <li>Copia de cedula o RUC.</li>
                <li>Copia de matricula del vehículo</li>
                <li>Pagar 7,20$ por cada dispositivo (No incluye la recarga)
                    Cuenta corriente Produbanco N°00000000000 o nombre de Panamericana vial S.A.Panavial
                    RUC.00000000000</li>
                <li>Enviar comprobante de deposito, copia de cedula y copia de matricula al:
                    Corre: serviciotlepasscliente@panavial.com</li>
                <li>Si posee otro tag lo registraremos en el sistema sin costos adicionales.</li>
                <li>La placa del vehículo debe estar instalada o el documento provisional pegado en el parabrisas
                    delantero.</li>
                <li>Copia de cedula o RUC.</li>
            </ul>
        </article>
    </main>
</body>

</html>