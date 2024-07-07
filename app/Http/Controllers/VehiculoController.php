<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Builders\VehiculoBuilder;

class VehiculoController extends Controller
{
    public function create()
    {
        return view('create');
    }

    // Este método maneja la lógica para almacenar un nuevo vehículo en la base de datos.
    public function store(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'idVehiculo' => 'required|integer',
            'placa' => 'required|string|max:10',
            'matricula' => 'required|string|max:20',
            'tipo_vehiculo' => 'required|string|max:20',
            'color' => 'required|string|max:20',
            'id_cliente' => 'required|integer',
        ]);

        // Crear el vehículo utilizando el Builder
        $vehiculo = (new VehiculoBuilder())
            ->setIdVehiculo($request->input('idVehiculo'))
            ->setPlaca($request->input('placa'))
            ->setMatricula($request->input('matricula'))
            ->setTipoVehiculo($request->input('tipo_vehiculo'))
            ->setColor($request->input('color'))
            ->setIdCliente($request->input('id_cliente'))
            ->build();

        // Guardar el vehículo en la base de datos
        $vehiculo->save();

        // Redirigir a una vista de éxito, por ejemplo
        //return redirect()->route('home')->with('success', 'Vehículo creado correctamente.');
    }
}
