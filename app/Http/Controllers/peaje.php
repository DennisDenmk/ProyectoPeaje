<?php

namespace App\Http\Controllers;
use App\Models\Peaje;
use Illuminate\Http\Request;

class PeajeController extends Controller
{
    public function index()
    {
        $peajes = Peaje::all();
        return view('peajes.index', compact('peajes'));
    }

    public function create()
    {
        return view('peajes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'tarifa_base' => 'required|numeric',
            'descuento' => 'nullable|numeric',
            'horario_apertura' => 'required|date_format:H:i',
            'horario_cierre' => 'required|date_format:H:i'
        ]);

        Peaje::create($request->all());

        return redirect()->route('peajes.index');
    }

    public function show(Peaje $peaje)
    {
        return view('peajes.show', compact('peaje'));
    }

    public function edit(Peaje $peaje)
    {
        return view('peajes.edit', compact('peaje'));
    }

    public function update(Request $request, Peaje $peaje)
    {
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'tarifa_base' => 'required|numeric',
            'descuento' => 'nullable|numeric',
            'horario_apertura' => 'required|date_format:H:i',
            'horario_cierre' => 'required|date_format:H:i'
        ]);

        $peaje->update($request->all());

        return redirect()->route('peajes.index');
    }

    public function destroy(Peaje $peaje)
    {
        $peaje->delete();
        return redirect()->route('peajes.index');
    }
}
