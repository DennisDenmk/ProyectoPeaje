<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Builders\VehiculoBuilder;

class VehiculoController extends Controller
{
    // Este método maneja la lógica para almacenar un nuevo vehículo en la base de datos.
    public function store(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'idVehiculo' => 'required|integer',
            'placa' => 'required|string|max:10',
            'tipo_vehiculo' => 'required|string|max:20',
            'anio' => 'required|integer',
            'id_cliente' => 'required|integer',
        ]);

        // Crear el vehículo utilizando el Builder
        $vehiculo = (new VehiculoBuilder())
            ->setIdVehiculo($request->input('idVehiculo'))
            ->setPlaca($request->input('placa'))
            ->setTipoVehiculo($request->input('tipo_vehiculo'))
            ->setAnio($request->input('anio'))
            ->setIdCliente($request->input('id_cliente'))
            ->build();

        // Guardar el vehículo en la base de datos
        $vehiculo->save();

        // Redirigir a la vista de perfil con un mensaje de éxito
        return redirect()->route('profile')->with('success', 'Vehículo creado correctamente.');
    }
}
