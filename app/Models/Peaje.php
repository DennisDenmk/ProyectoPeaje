<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peaje extends Model
{
    protected $table = 'peajes'; 

    protected $primaryKey = 'id_peaje'; 

    protected $fillable = [
        'ubicacion',
    ];

    // Relación con la tabla 'empleados'
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'id_peaje', 'id_peaje');
    }
}