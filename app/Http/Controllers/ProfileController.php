<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        $vehiculos = $user->vehiculos;

        return view('menu', ['user' => $user, 'vehiculos' => $vehiculos]);
    }
    public function showEmpleado()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        return view('profile-empleado', ['user' => $user]);
    }

    public function showChangePasswordForm()
    {
        return view('menu.change-password');
    }

    // FALTA EL CAMBIAR CONTRASEÑA YA ME CASE DE LA VIDA ARREGLEN
    /*
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->contrasenia)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta']);
        }

        $user->contrasenia = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('change-password-form')->with('status', 'Contraseña cambiada con éxito');
    }
        */

}
