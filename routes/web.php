<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\tablesController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\Auth\LoginController;
//use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VehiculoController;

// Página principal
Route::get('/', function () {
    return view('home');
});

// Rutas para tablas
Route::prefix('/')->group(function () {
    Route::get('/account', [tablesController::class, 'Account']);
    Route::get('/service', [tablesController::class, 'Service'])->name('service');
    Route::get('/Informacion', [tablesController::class, 'Telepass'])->name('telepass');
});

// Página de inicio
Route::get('/home', function () {
    return view('home');
})->name('home');


// Registro de usuarios
Route::prefix('register')->group(function () {
    Route::get('/', [RegistroController::class, 'showForm'])->name('register.form');
    Route::post('/', [RegistroController::class, 'saveData'])->name('register.guardar');
    // Registro de empleados
    Route::post('/empleado', [RegistroController::class, 'registerEmpleado'])->name('registro.empleado');
});

// Login y Logout
Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Perfil del cliente
Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('profile');
    Route::post('/cambiar-contrasenia', [ProfileController::class, 'updatePassword'])->name('updatePassword');
    Route::post('/guardar-placa', [ProfileController::class, 'guardarPlaca'])->name('guardar-placa');
});

// Perfil del empleado
Route::get('/profile-empleado', function () {
    $user = Auth::guard('empleado')->user();
    return view('profile-empleado', compact('user'));
})->name('profile-empleado');

Route::prefix('empleado')->middleware('auth:empleado')->group(function () {   
    Route::post('/cobro', [EmpleadoController::class, 'cobro'])->name('finanzas.cobro');
    Route::post('/recarga', [EmpleadoController::class, 'recargarSaldo'])->name('clientes.recargar');
});

// Administración
Route::get('/administrador', function () {
    return view('administrador');
})->middleware('auth:empleado');

Route::get('/administrador', [AdminController::class, 'verFinanzas'])->middleware(['auth:empleado'])->name('administrador');

// Vehículos
Route::prefix('vehiculos')->group(function () {
    Route::post('/asociar', [VehiculoController::class, 'asociar'])->name('vehiculos.asociar');
    Route::get('/emularTelepass', [VehiculoController::class, 'show']);
    Route::post('/emularTelepass', [VehiculoController::class, 'cobro'])->name('vehiculos.cobro');
});
