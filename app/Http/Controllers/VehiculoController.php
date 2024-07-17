<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Finanza;
use App\Models\Cliente;

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
            'cedula' => 'required|string|max:10',
            'placa' => 'required|string|max:10',
        ]);

        $vehiculo = Vehiculo::where('placa', $request->input('placa'))->first();

        if (!$vehiculo) {
            return back()->withErrors(['placa' => 'El vehículo no está registrado.']);
        }

        $cliente = Cliente::where('cedula', $request->input('cedula'))->first();

        if (!$cliente) {
            return back()->withErrors(['cedula' => 'El cliente no está registrado.']);
        }

        $vehiculo->id_cliente = $cliente->id_cliente;
        $vehiculo->save();

        return back()->with('success', 'Vehículo asociado correctamente.');
    }

    public function cobro(Request $request)
    {
        $request->validate([
            'id_peaje' => 'required|integer',
            'placa' => 'required|string',
        ]);

        $placa = $request->input('placa');
        $id_peaje = $request->input('id_peaje');
        $vehiculo = Vehiculo::where('placa', $placa)->first();

        if (!$vehiculo) {
            return back()->withErrors(['placa' => 'El vehículo no está registrado.']);
        }

        $cliente = $vehiculo->cliente;
        if (!$cliente) {
            return back()->withErrors(['placa' => 'El vehículo no tiene un cliente asociado.']);
        }

        $tipo_vehiculo = $vehiculo->tipo_Vehiculo;
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

        // Registrar el cobro en la tabla finanzas
        Finanza::create([
            'id_peaje' => $id_peaje,
            'saldo' => $costo,
            'fecha' => now(),
            'placa' => $vehiculo->placa,
            'tipo_Vehiculo' => $vehiculo->tipo_Vehiculo, // Nombre del campo ajustado
            'tipo_pago' => 2 // Tipo 2 para pagos desde emularTelepass
        ]);

        return back()->with('success', 'Cobro realizado con éxito. Saldo restante: ' . $cliente->saldo);
    }


}
