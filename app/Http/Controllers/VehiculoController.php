<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Finanza;
use Illuminate\Support\Facades\Auth;

class VehiculoController extends Controller
{
    public function show()
    {
        return view('emularTelepass');
    }
    // Este método maneja la lógica para almacenar un nuevo vehículo en la base de datos.
    public function asociar(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:10',
        ]);

        $vehiculo = Vehiculo::where('placa', $request->input('placa'))->first();

        if (!$vehiculo) {
            return back()->withErrors(['placa' => 'El vehículo no está registrado.']);
        }

        $cliente = auth()->user();

        $vehiculo->id_cliente = $cliente->id_cliente;
        $vehiculo->save();

        return back()->with('success', 'Vehículo asociado correctamente.');
    }

    public function cobro(Request $request)
    {
        $placa = $request->input('placa');
        $vehiculo = Vehiculo::where('placa', $placa)->first();

        if (!$vehiculo) {
            return back()->withErrors(['placa' => 'El vehículo no está registrado.']);
        }

        $cliente = $vehiculo->cliente;
        if (!$cliente) {
            return back()->withErrors(['placa' => 'El vehículo no tiene un cliente asociado.']);
        }

        $tipo_vehiculo = $vehiculo->tipo_vehiculo;
        $tarifas = [
            1 => 1.00, // Moto
            2 => 2.00, // Carro
            3 => 3.00, // Camioneta
            4 => 4.00, // Bus
            5 => 5.00, // Tractor
            7 => 0.20,  // moto
            8 => 0.50  //remolque
        ];

        if (!isset($tarifas[$tipo_vehiculo])) {
            return back()->withErrors(['placa' => 'Tipo de vehículo no válido.']);
        }

        $costo = $tarifas[$tipo_vehiculo];

        if ($cliente->saldo < $costo) {
            return back()->withErrors(['saldo' => 'Saldo insuficiente.']);
        }

        $cliente->saldo -= $costo;
        $cliente->save();

        $empleado = Auth::guard('empleado')->user(); // Obtener el empleado autenticado

        // Registrar el cobro en la tabla finanzas
        Finanza::create([
            'id_peaje' => $empleado->id_peaje,
            'saldo' => $costo,
            'fecha' => now(),
            'placa' => $vehiculo->placa,
            'tipo_vehiculo' => $tipo_vehiculo, // Nombre del campo ajustado
            'tipo_pago' => 2 // Tipo 2 para pagos desde emularTelepass
        ]);

        return back()->with('success', 'Cobro realizado con éxito. Saldo restante: ' . $cliente->saldo);
    }


}
