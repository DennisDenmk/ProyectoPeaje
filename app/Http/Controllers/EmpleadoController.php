<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//Modelos
use App\Models\Cliente;
use App\Models\Finanza;

class EmpleadoController extends Controller
{
    public function cobro(Request $request)
    {
        $request->validate([
            'saldo' => 'required|numeric',
            'tipo_vehiculo' => 'required|integer',
        ]);

        $empleado = Auth::user();
        
        Finanza::create([
            'id_peaje' => $empleado->id_peaje, // Obtener id_peaje del empleado autenticado
            'saldo' => $request->saldo,
            'id_empleado' => $empleado->id_empleado,  // Obtener id_empleado del empleado autenticado
            'fecha' => now(),  // Fecha actual del sistema
            'tipo_vehiculo' => $request->tipo_vehiculo,
        ]);

        return back()->with('success', 'Valor añadido correctamente');
    }
   
    public function recargarSaldo(Request $request)
    {
        $request->validate([
            'cedula_cliente' => 'required|string|max:10|exists:clientes,cedula',
            'monto' => 'required|numeric|min:0.01',
        ]);

        $cliente = Cliente::where('cedula', $request->cedula_cliente)->first();

        if ($cliente) {
            $cliente->saldo += $request->monto;
            $cliente->save();

            return back()->with('success', 'Saldo recargado correctamente.');
        } else {
            return back()->with('error', 'Cliente no encontrado.');
        }
    }

}
