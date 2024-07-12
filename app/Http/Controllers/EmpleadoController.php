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

    public function cobro(Request $request)
    {
        $request->validate([
            'saldo' => 'required|numeric',
            'tipo_vehiculo' => 'required|integer',
        ]);

        $empleado = Auth::user();

        if (!$empleado) {
            return back()->with('error', 'Usuario no autenticado.');
        }

        
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

    public function verFinanzas()
    {
        // Obtener todas las finanzas
        $finanzas = Finanza::all();

        // Calcular las ganancias por semana
        $gananciasPorSemana = Finanza::selectRaw('YEAR(fecha) as year, WEEK(fecha, 1) as week, SUM(saldo) as total')
            ->groupBy('year', 'week')
            ->orderBy('year', 'asc')
            ->orderBy('week', 'asc')
            ->get()
            ->mapWithKeys(function ($item) {
                return ["{$item->year}-W{$item->week}" => $item->total];
            });

        return view('administrador', compact('finanzas', 'gananciasPorSemana'));
    }
   

}
