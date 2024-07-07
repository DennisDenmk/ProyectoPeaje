<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_vehiculo'; // Nombre de la clave primaria en la tabla

    protected $fillable = [
        'placa', 'tipo_vehiculo', 'anio', 'id_cliente'
    ];

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
