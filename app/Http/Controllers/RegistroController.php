<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente; 
use App\Models\Empleado; 
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function saveData(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'cedula' => 'required|string|max:50|unique:clientes',
            'telefono' => 'required|string|max:10',
            'correo' => 'required|string|email|max:50|unique:clientes',
            'contrasenia' => 'required|string',
        ],
        [
            'cedula.unique' => 'Cédula ya registrada'
        ]);

        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->cedula = $request->cedula;
        $cliente->contrasenia = Hash::make($request->contrasenia);
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->saldo = 0;  
        $cliente->save();

        return back()->with('success', 'Registrado correctamente');
    }
    public function registerEmpleado(Request $request)
    {
        $request->validate([
            'cedula' => 'required|string|max:50|unique:empleados',
            'contrasenia' => 'required|string|',
            'rol' => 'required|string|max:50',
            'correo' => 'required|string|email|max:50|unique:empleados',
            'sueldo' => 'required|numeric', 
        ], [
            'cedula.unique' => 'Cédula ya registrada',
            'correo.unique' => 'Correo ya registrado',
            'sueldo.numeric' => 'El sueldo debe ser un valor numérico.',
        ]);

        // Crear un nuevo empleado con los datos validados
        $empleado = new Empleado();
        $empleado->cedula = $request->cedula;
        $empleado->contrasenia = Hash::make($request->contrasenia); // Hashear la contraseña
        $empleado->rol = $request->rol;
        $empleado->correo = $request->correo;
        $empleado->sueldo = (double) $request->sueldo; // Convertir a tipo double
        $empleado->save();


        return back()->with('success', 'Empleado registrado correctamente');
    }

    public function showRegisterForm()
    {
        return view('register');
    }
}