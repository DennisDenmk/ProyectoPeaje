<?php
// routes/web.php

//uso de controladores
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\tablesController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/database', [tablesController::class, 'Tables']);
Route::get('/Account', [tablesController::class, 'Account']);
Route::get('/Service', [tablesController::class, 'Service']);

Route::get('/home', function () {
    return view('home');
});

//Route::get('/menu',[tablesController::class,'menu']);
Route::get('/Ant', [tablesController::class, 'Ant']);

Route::get('/telepassInfo', [Controller::class, 'tele'])->name('telepass');

//-----RegistroCliente-------
Route::prefix('register')->group(function () {
    Route::get('/', [RegistroController::class, 'showForm'])->name('register.form');
    Route::post('/', [RegistroController::class, 'saveData'])->name('register.guardar');
});
//-----RegistroEmpleado------
Route::post('/registro', [RegistroController::class, 'registerEmpleado'])->name('registro.empleado');

//------Pagina login-------
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
// Ruta para procesar el login (POST)
Route::post('/login', [LoginController::class, 'login'])->name('login');
// Ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//-------Manejo de Perfil------
Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/menu/cambiar-contrasenia', [ProfileController::class, 'showChangePasswordForm'])->name('change-password-form');
Route::post('/menu/cambiar-contrasenia', [ProfileController::class, 'changePassword'])->name('change-password');
Route::post('/menu/añadir-vehiculo', [VehiculoController::class, 'addVehicle'])->name('vehiculo.add');

//Manejo de perfil como empleado
Route::get('/profile-empleado', function () {
    $user = Auth::guard('empleado')->user();
    return view('profile-empleado', compact('user'));
})->middleware('auth:empleado')->name('profile-empleado');

//Metodo de cobro
Route::post('/empleado/cobro', [EmpleadoController::class, 'cobro'])->middleware(['auth:empleado'])->name('finanzas.cobro');

Route::post('/empleado/recarga', [EmpleadoController::class, 'recargarSaldo'])->name('clientes.recargar');


Route::get('/administrador', function () {
    return view('administrador');
})->middleware('auth:empleado');

Route::get('/administrador', [AdminController::class, 'verFinanzas'])->middleware(['auth:empleado'])->name('administrador');

// Asociar vehículo existente
Route::post('/vehiculos/asociar', [VehiculoController::class, 'asociar'])->name('vehiculos.asociar');

//Manejo de perfil como empleado
Route::post('/guardar-placa', [ProfileController::class, 'guardarPlaca'])->name('guardar-placa');

// Cobro de vehículos
Route::get('/emularTelepass', [VehiculoController::class, 'show']);
Route::post('/emularTelepass', [VehiculoController::class, 'cobro'])->name('vehiculos.cobro');
