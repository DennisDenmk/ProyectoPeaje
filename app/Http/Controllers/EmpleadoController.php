<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//Modelos
use App\Models\Vehiculo;
use App\Models\Finanza;


class EmpleadoController extends Controller
{
    public function showEmpleado()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        return view('profile-empleado', compact('user'));
    }

    public function cobro(Request $request)
    {
        $request->validate([
            'tipo_Vehiculo' => 'required|integer',
        ]);

        $empleado = Auth::user();
        
        $saldos = [
            1 => 1.00, // Moto
            2 => 2.00, // Carro
            3 => 3.00, // Camioneta
            4 => 4.00, // Bus
            5 => 5.00, // Tractor
            7 => 0.20,  // moto
            8 => 0.50  //remolque
        ];

        $tipo_Vehiculo = $request->input('tipo_Vehiculo');
        $saldo = $saldos[$tipo_Vehiculo];

        Finanza::create([
            'id_peaje' => $empleado->id_peaje, // Obtener id_peaje del empleado autenticado
            'saldo' => $saldo,
            'fecha' => now(),  // Fecha actual del sistema
            'placa' => null,
            'tipo_Vehiculo' => $request->tipo_Vehiculo,
            'tipo_pago' => '1',
        ]);

        return back()->with('success', 'Valor añadido correctamente');
    }
   
    public function recargarSaldo(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|max:7|exists:vehiculos,placa',
            'monto' => 'required|numeric|min:0.01',
        ]);
    
        // Buscar el vehículo por la placa
        $vehiculo = Vehiculo::where('placa', $request->placa)->first();
    
        // Si el vehículo existe, obtener el cliente asociado
        if ($vehiculo && $vehiculo->cliente) {
            $cliente = $vehiculo->cliente;
            $cliente->saldo += $request->monto;
            $cliente->save();

            return back()->with('success', 'Saldo recargado correctamente.');
        } else {
            return back()->with('error', 'Cliente no encontrado.');
        }
    }

    
   

}
