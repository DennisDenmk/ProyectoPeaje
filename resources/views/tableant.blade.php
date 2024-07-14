<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">      
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="ico">  
    <title>Sistema ANT</title>
</head> 
<body>
    
    <div class="container mt-5">
        <h1>ANT</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PLACA</th>
                    <th>MATRICULA</th>
                    <th>MODELO</th>
                    <th>CREADO</th>
                    <th>ACTUALIZADO</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ant as $ant)
                    <tr>
                        <td>{{$ant->idVehiculo}}</td>
                        <td>{{$ant->placa }}</td>
                        <td>{{$ant->matricula }}</td>
                        <td>{{$ant->modelo }}</td>
                        <td>{{$ant->created_at }}</td>
                        <td>{{$ant->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{asset('js/app.js')}}">

    </script>
</body>
</html>