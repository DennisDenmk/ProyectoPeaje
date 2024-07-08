<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Vehiculo;

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

    public function showChangePasswordForm()
    {
        return view('menu.change-password');
    }

    /*
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('change-password-form')->with('status', 'Contraseña cambiada con éxito');
    }
    */
}
