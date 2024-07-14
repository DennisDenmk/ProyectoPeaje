<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente;


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        $vehiculos = $user->vehiculos; // Obtener los vehículos del usuario

        return view('menu', compact('user', 'vehiculos'));
    }

    public function showEmpleado()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        return view('profile-empleado', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $cliente = Auth::user();

        if (!Hash::check($request->current_password, $cliente->contrasenia)) {
            return back()->with('error', 'La contraseña actual no es correcta.');
        }

        $cliente->contrasenia = Hash::make($request->new_password);
        //$cliente->save(); // Debería funcionar correctamente si el modelo está bien configurado

        return back()->with('success', 'La contraseña ha sido cambiada exitosamente.');
    }
}

