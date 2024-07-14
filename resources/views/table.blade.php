<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">    
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico">    
    <title>Peaje</title>
</head> 
<body>
    
    <div class="container mt-5">
        <h1>Usuarios</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CEDULA</th>
                    <th>NOMBRE</th>
                    <th>CREADO</th>
                    <th>ACTUALIZADO</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{$customer->idVehiculo}}</td>
                        <td>{{$customer->cedula }}</td>
                        <td>{{$customer->nombre }}</td>
                        <td>{{$customer->created_at }}</td>
                        <td>{{$customer->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{asset('js/app.js')}}">

    </script>
</body>
</html>