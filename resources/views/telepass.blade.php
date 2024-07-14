<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/telepass.css')}}">  
    <link rel="stylesheet" href="{{asset('css/footer.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/nav.css')}}"> 
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">       
    <title>Informe Telepass</title>
</head>

<body>
    @include('components.header-nav')
    <main class="principal">
        <section class="img-peajes">
        </section>
        <article class="explicacion">
            <p id="explicacion">
                Para mejorar la asistencia a los usuarios, se han implementado vías exclusivas 
                para el servicio TELEPASS en ambas direcciones en todas las estaciones de peaje, 
                disponibles para todo tipo de vehículos.
                Estas vías, señalizadas claramente con indicaciones y una pantalla que muestra 
                "EXCLUSIVO TELEPASS", están delimitadas por conos en su entrada.
                Son vías automáticas sin cajeros, por lo que solo pueden ser utilizadas
                 por usuarios registrados en el servicio y con saldo en sus cuentas de prepago 
                El acceso a este servicio es sencillo y rápido, disponible en las oficinas de atención 
                al cliente en cada estación de peaje o a través de nuestra página web.
            </p>
        </article>

        <div class="requisito">
            <h1>Requisitos para adquirir el TELEPASS</h1>
        </div>
        <article class="explicacion quitar-margentop">
            <ul>
                <li>Tener una cuenta Peaje.</li>
                <li>Copia de cédula o RUC.</li>
                <li>Copia de matrícula del vehículo</li>
                <li>Enviar comprobante de deposito, copia de cédula y copia de matrícula al:
                    Correo: info@peajesistema.com</li>
                <li>Si posee otro tag lo registraremos en el sistema sin costos adicionales.</li>
                <li>La placa del vehículo debe estar instalada y en buenas condiciones</li>
                <li>Copia de cédula o RUC.</li>
            </ul>
        </article>
    </main>
    @include('components.footer')
</body>

</html>