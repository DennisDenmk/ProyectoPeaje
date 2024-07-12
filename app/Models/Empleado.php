<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Empleado extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = 'empleados'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_empleado'; // Nombre de la llave primaria

    protected $fillable = [
        'contrasenia',
        'cedula',
        'rol',
        'id_peaje',
        'correo',
    ];

    // Relación con la tabla 'peajes'
    public function peaje()
    {
        return $this->belongsTo(Peaje::class, 'id_peaje', 'id_peaje');
    }
}
