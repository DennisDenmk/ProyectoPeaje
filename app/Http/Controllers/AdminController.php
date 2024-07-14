<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finanza;

class AdminController extends Controller
{
    
    public function verFinanzas(Request $request)
    {
        $query = Finanza::query();

        if ($request->filled('tipo_vehiculo')) {
            $query->where('tipo_Vehiculo', $request->input('tipo_vehiculo'));
        }

        if ($request->filled('fecha')) {
            $query->whereDate('fecha', $request->input('fecha'));
        }

        if ($request->filled('tipo_pago')) {
            $query->where('tipo_pago', $request->input('tipo_pago'));
        }

        $finanzas = $query->get();

        return view('administrador', compact('finanzas'));
    }
}
