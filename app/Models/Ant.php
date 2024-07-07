<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Importa la clase DB

class Ant extends Model{
    use HasFactory;

    protected $table='vehiculos';
    protected $fillable=['idVehiculo','placa','matricula','modelo','created_at', 'updated_at'];
}
