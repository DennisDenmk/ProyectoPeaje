<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Builders\VehiculoBuilder;
use App\Models\Vehiculo;
use App\Models\Cliente;

class VehiculoController extends Controller
{
    public function show(){
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
            6 => 6.00  // Trailer
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

        return back()->with('success', 'Cobro realizado con éxito. Saldo restante: ' . $cliente->saldo);
    }
}
