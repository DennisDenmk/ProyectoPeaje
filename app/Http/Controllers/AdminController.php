<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finanza;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('administrador');
    }
    
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

        $finanzas = $query->with('peaje')->get();

        $categoriasVehiculos = [
            1 => 'Categoria 1',
            2 => 'Categoria 2',
            3 => 'Categoria 3',
            4 => 'Categoria 4',
            5 => 'Categoria 5',
            6 => 'Categoria 6',
            7 => 'Categoria 7',
            8 => 'Categoria 8'
        ];

        $tiposPago = [
            1 => 'Efectivo',
            2 => 'Telepass'
        ];

        return view('administrador', compact('finanzas', 'categoriasVehiculos', 'tiposPago'));
    }
}
