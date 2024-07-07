<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\Empleado;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('Login');
    }

    public function login(Request $request)
{
    // Validar los datos del formulario de login
    $credentials = $request->validate([
        'cedula' => 'required|string|max:10',
        'contrasenia' => 'required|string',
    ]);

    // Verificar si se seleccionó tipo de usuario
    if ($request->has('tipo_usuario')) {
        foreach ($request->tipo_usuario as $tipo) {
            if ($tipo === 'cliente') {
                // Intentar autenticar al usuario como cliente
                $cliente = Cliente::where('cedula', $credentials['cedula'])->first();

                if ($cliente && Auth::attempt(['cedula' => $credentials['cedula'], 'password' => $credentials['contrasenia']], false)) {
                    // Autenticación exitosa para cliente, redirigir a la página de menú
                    return redirect()->intended('/profile');
                }
            } elseif ($tipo === 'empleado') {
                // Intentar autenticar al usuario como empleado
                $empleado = Empleado::where('cedula', $credentials['cedula'])->first();

                if ($empleado && Auth::attempt(['cedula' => $credentials['cedula'], 'password' => $credentials['contrasenia']], false)) {
                    // Autenticación exitosa para empleado, redirigir a la página de menú de empleado
                    return redirect()->intended('/profile');
                }
            }
        }
    }

    // Autenticación fallida, redirigir de vuelta con un mensaje de error
    return back()->withErrors([
        'cedula' => 'Las credenciales ingresadas no son válidas.',
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}