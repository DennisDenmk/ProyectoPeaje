<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finanza;

class AdminController extends Controller
{
    
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
