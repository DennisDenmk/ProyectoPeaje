<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finanza;
use App\Models\Peaje;
use Illuminate\Support\Facades\Auth;

class FinanzaController extends Controller
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

        return back()->with('success', 'Valor añadido correctamente.');
    }

    
}
