<?php

//uso de controladores
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tablesController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/database',[tablesController::class,'Tables']);
Route::get('/Account',[tablesController::class,'Account']);
Route::get('/Service',[tablesController::class,'Service']);
Route::get('/home',[tablesController::class,'Home'])->name('home');

Route::get('/menu',[tablesController::class,'menu']);
Route::get('/Ant',[tablesController::class,'Ant']);


Route::get('/telepassInfo',[Controller::class,'tele'])->name('telepass');

//-----RegistroCliente-------
Route::get('/register', [RegistroController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegistroController::class, 'saveData'])->name('register.guardar');
//-----RegistroEmpleado--
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

//Manejo de perfil como empleado
Route::get('/profile-empleado', [ProfileController::class, 'showEmpleado'])->name('profile-empleado')->middleware('auth');
Route::post('/guardar-placa', [ProfileController::class, 'guardarPlaca'])->name('guardar-placa');